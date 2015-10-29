<?php 

$data = array(
    'product_ids' => null,
    'name' => sprintf('AUTO_GENERATION CUSTOMER_%s - 30%% Summer discount', Mage::getSingleton('customer/session')->getCustomerId()),
    'description' => null,
    'is_active' => 1,
    'website_ids' => array(1),
    'customer_group_ids' => array(1),
    'coupon_type' => 2,
    'coupon_code' => Mage::helper('core')->getRandomString(16),
    'uses_per_coupon' => 1,
    'uses_per_customer' => 1,
    'from_date' => null,
    'to_date' => null,
    'sort_order' => null,
    'is_rss' => 1,
    'rule' => array(
        'conditions' => array(
            array(
                'type' => 'salesrule/rule_condition_combine',
                'aggregator' => 'all',
                'value' => 1,
                'new_child' => null
            )
        )
    ),
    'simple_action' => 'by_percent',
    'discount_amount' => 30,
    'discount_qty' => 0,
    'discount_step' => null,
    'apply_to_shipping' => 0,
    'simple_free_shipping' => 0,
    'stop_rules_processing' => 0,
    'rule' => array(
        'actions' => array(
            array(
                'type' => 'salesrule/rule_condition_product_combine',
                'aggregator' => 'all',
                'value' => 1,
                'new_child' => null
            )
        )
    ),
    'store_labels' => array('30% Summer discount')
);
 
$model = Mage::getModel('salesrule/rule');
$data = $this->_filterDates($data, array('from_date', 'to_date'));
 
$validateResult = $model->validateData(new Varien_Object($data));
 
if ($validateResult == true) {
 
    if (isset($data['simple_action']) && $data['simple_action'] == 'by_percent'
            && isset($data['discount_amount'])) {
        $data['discount_amount'] = min(100, $data['discount_amount']);
    }
 
    if (isset($data['rule']['conditions'])) {
        $data['conditions'] = $data['rule']['conditions'];
    }
 
    if (isset($data['rule']['actions'])) {
        $data['actions'] = $data['rule']['actions'];
    }
 
    unset($data['rule']);
 
    $model->loadPost($data);
 
    $model->save();
}
?>