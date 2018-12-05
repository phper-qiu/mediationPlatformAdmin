<?php
namespace Api\Controller;
use Think\Controller;

class ShopController extends PublicController
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
    }

    /**
     * 获取机构信息内容
     */
    public function getShopOrganization()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        $uid = $data['uid'];

        if (!$uid) {
            errReturn('500', '请上传参数');
        }

        $params['uid'] = $uid;

        $res = D("Shop", "Logic")->getShopInfo($params);

        succReturn($res['data'], $res['info'], $res['status']);
    }


    /**
     * 上传店铺信息
     */
    public function postShopOrganization()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['uid'] || !$data['shop_name'] || !$data['shop_title']
            || !$data['category_id'] || !$data['reg_date']
            || !$data['province_id'] || !$data['city_id']
            || !$data['district_id'] || !$data['address']
            || !$data['tell_phone']  || !$data['mobile_phone']
            || !$data['contact']     || !$data['wx_no']
            || !$data['province_name']|| !$data['city_name']
            || !$data['district_name']
        ) {
            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->saveShop($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }

    /**
     * 上传学习环境
     */
    public function postShopEnv()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id'] || !isset($data['env']) || empty($data['env'])) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->saveShopEnv($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();

    }

    /**
     *
     * 获取环境
     */
    public function getShopEnv()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id']) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->getShopEnv($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }

    /**
     * 上传师资力量
     */
    public function postShopFaculty()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id'] || !isset($data['faculty']) || empty($data['faculty'])) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->saveShopFac($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();
    }


    /**
     * 获取师资力量
     */
    public function getShopFaculty()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id']) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->getFacultys($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }


    /**
     * 上传店铺主图
     */
    public function postShopPic()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id']
            || !isset($data['cover_pic']) || !$data['cover_pic']
            || !isset($data['other']) || empty($data['other'])) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->saveShopPics($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();
    }


    /**
     * 获取店铺主图
     */
    public function getShopPic()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id']) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->getShopPics($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }


    /**
     * 发表评论
     */
    public function postShopComment()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id'] || !$data['uid']
            || !$data['star'] || !$data['content']) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->addShopComments($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();
    }


    /**
     * 获取评论
     */
    public function getShopEvaluates()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['shop_id']) {

            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->getShopEva($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }


    /**
     * 删除学习环境
     */
    public function delShopEnv()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['env_id']) {
            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->deleteShopEnv($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();
    }


    /**
     * 删除教师
     */
    public function delFaculty()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");

        if (!$data['fac_id']) {
            errReturn('503', '参数不全');
        }

        $res = D("Shop", "Logic")->deleteShopFac($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn();
    }


    /**
     * 获取类别
     */
    public function getShopCategory()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }


        $res = D("Shop", "Logic")->getCategory();

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }



    /**
     * 获取评论
     */
    public function getShops()
    {
        if (!IS_POST) {
            errReturn('501', '非法请求');
        }

        $data = I("post.");


        $res = D("Shop", "Logic")->getShopList($data);

        if ($res['status'] != 200) {
            errReturn($res['status'], $res['info']);
        }

        succReturn($res['data']);
    }




}