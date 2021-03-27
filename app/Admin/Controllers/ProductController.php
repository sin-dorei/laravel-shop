<?php

namespace App\Admin\Controllers;

use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProductController extends AdminController
{
    protected $title = 'Product';

    protected function grid()
    {
        $grid = new Grid(new Product);

        $grid->column('id', __('ID'))->sortable();
        $grid->column('title', __('商品名称'));
        $grid->column('on_sale', __('已上架'))->display(function ($value) {
            return $value ? '是' : '否';
        });
        $grid->column('price', __('价格'));
        $grid->column('rating', __('评分'));
        $grid->column('sold_count', __('销量'));
        $grid->column('review_count', __('评论数'));
        $grid->actions(function ($actions) {
            $actions->disableView();
            $actions->disableDelete();
        });
        $grid->tools(function ($tools) {
            $tools->batch(function ($batch) {
                $batch->disableDelete();
            });
        });

        return $grid;
    }

    protected function form()
    {
        $form = new Form(new Product);

        $form->text('title', __('商品名称'))->rules('required');
        $form->image('image', __('封面图片'))->rules('required|image');
        $form->quill('description', __('商品描述'))->rules('required');
        $form->radio('on_sale', __('上架'))->options(['1' => '是', '0' => '否'])->default('0');
        $form->hasMany('skus', 'SKU 列表', function (Form\NestedForm $form) {
            $form->text('title', 'SKU 名称')->rules('required');
            $form->text('description', 'SKU 描述')->rules('required');
            $form->text('price', '单价')->rules('required|numeric|min:0.01');
            $form->text('stock', '剩余库存')->rules('required|integer|min:0');
        });

        $form->saving(function (Form $form) {
            $form->model()->price = collect($form->input('skus'))->where(Form::REMOVE_FLAG_NAME, 0)->min('price') ?: 0;
        });

        $form->tools(function (Form\Tools $tools) {
            $tools->disableDelete();
            $tools->disableView();
            // $tools->disableList();
        });

        return $form;
    }
}
