<?php


use vitalik74\comagic\Comagic;

class ComagicTest extends \Codeception\TestCase\Test
{
    use \Codeception\Specify;

    private $key = null;
    /**
     * @var \FunctionalTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAuth()
    {
        $model = $this->getModel();

        $this->specify('check session key', function () use ($model) {
            $this->assertNotEmpty($model->getSessionKey());
        });

    }

    private function getModel()
    {
        $config = $this->getParams();
        $model = new Comagic([
            'login' => $config['login'],
            'password' => $config['password']
        ]);

        return $model;
    }

    public function testMagicMethods()
    {
        $model = $this->getModel();
        $customerId = 0;
        $this->specify('get customerList()', function () use ($model, &$customerId) {
            $customerList = $model->customerList();
            foreach ($customerList as $v) {
                $customerId = $v['id'];
                break;
            }

            $this->assertNotEmpty($customerList);
        });

        $this->specify('get agentTp()', function () use ($model) {
            $this->assertNotEmpty($model->agentTp());
        });

        $this->specify('get site()', function () use ($model, $customerId) {
            $this->assertNotEmpty($model->site(['customer_id' => $customerId]));
        });

        $this->specify('get ac()', function () use ($model, $customerId) {
            $data = $model->ac(['customer_id' => $customerId]);
            $this->assertNotEmpty($data);
        });

        $this->specify('get getCdrIn()', function () use ($model, $customerId) {
            $data = $model->getCdrIn(['customer_id' => $customerId, 'date_from' => date('Y-m-d'), 'date_till' => date('Y-m-d')]);
            $this->assertEquals(true, is_array($data));
        });

        $this->specify('get getCdrOut()', function () use ($model, $customerId) {
            $data = $model->getCdrOut(['customer_id' => $customerId, 'date_from' => date('Y-m-d'), 'date_till' => date('Y-m-d')]);
            $this->assertEquals(true, is_array($data));
        });
    }

    private function getParams()
    {
        // set your params in root/authParams.php (create file)
        $params = include __DIR__ . "/../../authParams.php"; // set the auth params for tests

        if (empty($params) || empty($params['login']) || empty($params['password'])) {
            die('No load authParams.php file.');
        }

        return $params;
    }

}