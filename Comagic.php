<?php
/**
 * Class Comagic
 * @author Tsibikov Vitaliy <tsibikov_vit@mail.ru> <tsibikov.com>
 * Create date: 15.04.2015 16:31
 */

namespace vitalik74\comagic;

//use vitalik74\simple-request-json;

use vitalik74\request\Request;

/**
 * Class Comagic
 * @package vitalik74\comagic
 *
 * @method customerList() Получение списка клиентов агента @see www.comagic.ru/support/article/137/#poluchenie-spiska-klientov-agenta
 *
 * @method agentTp() Получение списка тарифных планов клиентов агента @see www.comagic.ru/support/article/137/#poluchenie-spiska-tarifnih-planov-klientov-agentapoluchenie-spiska-tarifnih-planov-klientov-agenta
 *
 * @method createAgentCustomer(Array $attributes) Создание клиента агента @see www.comagic.ru/support/article/137/#sozdanie-klienta-agenta
 *
 * @method activateAgentCustomer($customer_id) Получение списка тарифных планов клиентов агента @see www.comagic.ru/support/article/137/#aktivaciya-klientov
 *
 * @method site($args = ['customer_id' => 'integer']) Получение списка сайтов @see www.comagic.ru/support/article/137/#poluchenie-spiska-saytov
 *
 * @method createSite($args = ['domain' => 'text', 'user_phone' => 'text', 'target_call_min_duration' => 'integer', 'customer_id' => 'integer']) Создание сайта @see www.comagic.ru/support/article/137/#sozdanie-saytov
 *
 * @method ac($args = ['site_id' => 'integer', 'customer_id' => 'integer']) Получение списка рекламных кампаний @see www.comagic.ru/support/article/137/#poluchenie-spiska-reklamnih-kampaniy
 *
 * @method createAc($args = ['customer_id' => 'integer', 'site_id' => 'integer', 'name' => 'text']) Создание рекламной кампании @see www.comagic.ru/support/article/137/#soadanie-reklamnoy-kampanii
 *
 * @method acCondition($args = ['customer_id' => 'integer', 'id' => 'integer']) Получение настроек рекламной кампании  @see www.comagic.ru/support/article/137/#poluchenie-nastroek-reklamnoy-kampanii
 *
 * @method createAcConditionGroup($args = ['customer_id' => 'integer', 'ac_id' => 'integer', 'name' => 'text']) Добавление группы условий в настройки рекламной кампании @see www.comagic.ru/support/article/137/#dobavlenie-gruppi-usloviy-v-nastroyki-reklamnoy-kampanii
 *
 * @method createAcCondition($args = ['customer_id' => 'integer', 'ac_condition_group_id' => 'integer', 'ac_parameter' => 'text', 'ac_operator' => 'text', 'value' => 'text', 'is_negative' => 'bool']) Добавление условия в настройки рекламной кампании @see www.comagic.ru/support/article/137/#dobavlenie-usloviya-v-nastroyki-reklamnoy-kampanii
 *
 * @method deleteAcCondition($args = ['customer_id' => 'integer', 'ac_id' => 'integer', 'ac_condition_id' => 'integer']) Удаление условия из настроек рекламной кампании @see www.comagic.ru/support/article/137/#udalenie-usloviya-iz-nastroek-reklamnoy-kampanii
 *
 * @method tag($args = ['customer_id' => 'interger']) Получение списка тегов @see www.comagic.ru/support/article/137/#poluchenie-spiska-tegov
 *
 * @method buyNumber($args = ['customer_id' => 'integer', 'region' => 'text']) Покупка номера @see www.comagic.ru/support/article/137/#pokupka-nomera
 *
 * @method createDialingOperation($args = ['comagic_phone' => 'text', 'user_phone' => 'text']) Настройка переадресации @see www.comagic.ru/support/article/137/#nastroyka-pereadresacii
 *
 * @method createNumaList($args = ['customer_id' => 'integer', 'name' => 'text']) Создание списка АОНов @see www.comagic.ru/support/article/137/#sozdanie-skiska-aonov
 *
 * @method addNumberToNumaList($args = ['customer_id' => 'integer', 'numa_list_id' => 'integer', 'number' => 'text']) Добавление номера в список АОНов @see www.comagic.ru/support/article/137/#dobavlenie-nomera-v-spisok
 *
 * @method removeNumberFromNumaList($args = ['customer_id' => 'integer', 'numa_list_id' => 'integer', 'number' => 'text']) Удаление номера из списка АОНов @see www.comagic.ru/support/article/137/#udalenie-nomera-iz-spiska-aonov
 *
 * @method stat($args = ['site_id' => 'integer', 'date_from' => 'text', 'date_till' => 'text', 'ac_id' => 'integer', 'customer_id' => 'integer']) Получение статистики по сайту @see www.comagic.ru/support/article/137/#poluchenie-statistiki-po-saytu
 *
 * @method communication($args = ['customer_id' => 'integer', 'site_id' => 'site_id', 'date_from' => 'text', 'date_till' => 'text', 'ac_id' => 'integer', 'tag_id' => 'integer', 'show_not_goal' => 'boolean', 'only_first' => 'boolean']) Получение списка обращений @see www.comagic.ru/support/article/137/#poluchenie-spiska-obrasheniy
 *
 * @method goal($args = ['site_id' => 'integer', 'date_from' => 'timestamp', 'date_till' => 'timestamp', 'customer_id' => 'integer', 'id' => 'integer', 'ac_id' => 'integer', 'tag_id' => 'integer', 'visitor_id' => 'integer']) Получение информации о достигнутых целях @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-dostignutih-celyah
 *
 * @method call($args = ['date_from' => 'text', 'date_till' => 'text', 'id' => 'integer', 'site_id' => 'integer', 'ac_id' => 'integer', 'tag_id' => 'integer', 'visitor_id' => 'integer', 'numa' => 'text', 'numb' => 'text', 'customer_id' => 'integer']) Получение информации о звонках @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-zvonkah
 *
 * @method getCdrIn($args = ['customer_id' => 'integer', 'date_from' => 'text', 'date_till' => 'text', 'id' => 'integer']) Получение информации о входящих звонках @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-vhodyashih-zvonkah
 *
 * @method getCdrOut($args = ['customer_id' => 'integer', 'date_from' => 'text', 'date_till' => 'text']) Получение информации об исходящих звонках @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-ishodyashih-zvonkah
 *
 * @method chat($args = ['customer_id' => 'integer', 'site_id' => 'integer', 'tag_id' => 'integer', 'visitor_id' => 'integer', 'user_id' => 'integer', 'date_from' => 'text', 'date_till' => 'text', 'ac_id' => 'integer']) Получение информации о чатах @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-chatah
 *
 * @method chatMessages($args = ['customer_id' => 'integer', 'chat_id' => 'integer']) Получение сообщений чата @see www.comagic.ru/support/article/137/#poluchenie-soobsheniy-chata
 *
 * @method offlineMessage($args = ['customer_id' => 'integer', 'site_id' => 'integer', 'tag_id' => 'integer', 'visitor_id' => 'integer', 'date_from' => 'text', 'date_till' => 'text', 'ac_id' => 'integer']) Получение информации о заявках  @see www.comagic.ru/support/article/137/#poluchenie-informacii-o-zayavkah
 *
 * @method tagCommunicatiom ($args = ['customer_id' => 'integer', 'object_id' => 'integer', 'object_type' => 'text', 'mark_id' => 'integer']) Установка тега обращению (в названии функции не ошибка, такая у них :( ) @see www.comagic.ru/support/article/137/#ustanovka-tega-obrasheniya
 *
 * @method tagCommunicationSale($args = ['customer_id' => 'integer', 'object_id' => 'integer', 'object_type' => 'text', 'cost' => 'float', 'date_time' => 'timestamp']) Установка тега "Продажа"  @see www.comagic.ru/support/article/137/#teg-prodaja
 *
 * @method untagCommunication($args = ['customer_id' => 'integer', 'object_id' => 'integer', 'object_type' => 'text', 'mark_id' => 'integer']) Удаление тега у обращения  @see www.comagic.ru/support/article/137/#udalenie-tega-u-obrasheniya
 *
 * @method personByVisitor($args = ['customer_id' => 'integer', 'id' => 'integer']) Получение id персоны по id посетителя @see www.comagic.ru/support/article/137/#poluchenie-id-personi-po-id-posetitelya
 *
 * @method visitorsByPerson($args = ['customer_id' => 'integer', 'id' => 'integer']) Получение списка посетителей, объединенных в персону @see www.comagic.ru/support/article/137/#poluchenie-spiska-posetiteley-obedenennih-v-personu
 *
 * @method visitor($args = ['visitor_id' => 'integer', 'customer_id' => 'integer']) Получение информации по посетителю  @see www.comagic.ru/support/article/137/#poluchenie-informacii-po-posetitelyu
 *
 * @method sessionInfo($args = ['customer_id' => 'integer', 'session_id' => 'integer']) Получение информации о сессии посетителя @see www.comagic.ru/support/article/137/#informaciya-o-sessii-posetitelya
 *
 * @method advertisingSales($args = ['customer_id' => 'integer', 'site_id' => 'integer', 'date_from' => 'timestamp', 'date_till' => 'timestamp', 'only_first' => 'boolean', 'only_quality' => 'boolean']) Получение первичной информации для формирования отчета о ROI @see www.comagic.ru/support/article/137/#informaciya-dlya-roi
 *
 */
class Comagic
{
    const VERSION_API = 'v1';

    /**
     * @var string
     */
    public $urlApi = 'http://api.comagic.ru/api';

    /**
     * Session key
     * @var null
     */
    private $_sessionKey = null;

    /**
     * Methods with Get response
     * @var array
     */
    private $_GETMethods = [
        'customer_list',
        'agent_tp',
        'site',
        'ac',
        'ac_condition',
        'tag',
        'stat',
        'communication',
        'goal',
        'call',
        'get_cdr_in',
        'get_cdr_out',
        'chat',
        'chat_messages',
        'offline_message',
        'person_by_visitor',
        'visitors_by_person',
        'visitor',
        'session_info',
        'advertising_sales'
    ];

    /**
     * ~~~
     * $comagic = new Comagic(['login' => 'login', 'password' => 'password', 'urlApi' => 'http://api.comagic.ru/api']);
     * ~~~
     * @param array $config array with key-value pairs
     */
    public function __construct($config = [])
    {
        if (!empty($config['login']) && !empty($config['password'])) {
            $this->_sessionKey = $this->auth($config['login'], $config['password']);
        }

        if (!empty($config['urlApi'])) {
            $this->urlApi = $config['urlApi'];
        }
    }

    /**
     * @param $login
     * @param $password
     * @return mixed
     * @throws Exception
     */
    public function auth($login, $password)
    {
        try {
            $request = new Request(['url' => $this->urlApi . '/login/?login=' . $login . '&password=' . $password, 'postData' => [], 'method' => 'POST', 'noData' => true, 'sendToJsonFormat' => false]);
            $response = $request->getResponse();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }

        if (empty($response['success'])) {
            throw new Exception($response['message']);
        }

        return $response['data']['session_key'];
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     */
    function __call($method, $arguments)
    {
        return $this->getResponse($method, $arguments);
    }

    /**
     * Get current session key
     * @return null
     */
    public function getSessionKey()
    {
        return $this->_sessionKey;
    }

    /**
     * @param $method
     * @param $arguments
     * @return mixed
     * @throws Exception
     */
    private function getResponse($method, $arguments)
    {
        $method = $this->underscore($method);

        try {
            $data = ['session_key' => $this->getSessionKey()];
            $request = new Request([
                'url' => $this->urlApi . '/' . Comagic::VERSION_API . '/' . $this->underscore($method) . '/',
                'postData' => !empty($arguments[0]) ? array_merge($data, $arguments[0]) : $data ,
                'method' => in_array($method, $this->_GETMethods) ? 'GET' : 'POST',
                'sendToJsonFormat' => false
            ]);
            $response = $request->getResponse();

            if (!empty($response['success'])) {
                return $response['data'];
            } else {
                throw new Exception($response['message']);
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }


    /**
     * From Yii2 in Inflector helper
     * @param $words
     * @return string
     */
    public function underscore($words)
    {
        return strtolower(preg_replace('/(?<=\\w)([A-Z])/', '_\\1', $words));
    }
}