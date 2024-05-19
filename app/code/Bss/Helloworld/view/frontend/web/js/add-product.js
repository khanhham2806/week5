define([
    'jquery',
    'Magento_Ui/js/modal/confirm'
], function ($,confirm) {
    'use strict';

    $.widget('bss.addProduct', {

        _create: function () {
            this._bind();
        },
        _bind: function () {
            const self = this;

            self.element.find('#btn-add-product').on('click', function (e) {
                e.preventDefault();
                self._addProduct();
            });
            self._on(this.element.find('#table-product>tbody'), {
                'click .btn-delete-product': function (e) {
                    e.preventDefault();
                    self._promptDelete(e.currentTarget);
                }
            });
        },
        _addProduct: function () {
            const name = this.element.find('#name').val(),
                price = this.element.find('#price').val(),
                description = this.element.find('#description').val(),
                image = this.element.find('#image').val(),
                row = `
                <tr>
                    <td>${name}</td>
                    <td>${price}</td>
                    <td>${description}</td>
                    <td><img src=${image} alt='Product image' /></td>
                    <td><button class="btn-delete-product">Delete</button></td>
                </tr>
                `;

            this.element.find('#table-product tbody').append(row);
        },
        _promptDelete: function (button) {
            const self = this;

            confirm({
                title: $.mage.__('Do you want to delete'),
                actions: {
                    confirm: function () {
                        self._deleteProduct(button);
                    }
                }
            });
        },
        _deleteProduct: function (button) {
            button.closest('tr').remove();
        }
    });
    return $.bss.addProduct;
});
