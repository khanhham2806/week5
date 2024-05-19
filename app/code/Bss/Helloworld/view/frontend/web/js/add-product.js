define([
    'jquery'
], function ($) {
    'use strict';
    return function () {
        $('#btn-add-product').click(function (e) {
            e.preventDefault();
            const name = $('#name').val(),
                price = $('#price').val(),
                description = $('#description').val(),
                image = $('#image').val(),
                row = `
            <tr>
                <td>${name}</td>
                <td>${price}</td>
                <td>${description}</td>
                <td><img src=${image} alt='Product image' /></td>
                <td><button class="btn-delete-product">Delete</button></td>
            </tr>
            `,
                tableBody = $('#table-product>tbody');

            tableBody.append(row);
        });

        $('#table-product>tbody').on('click', '.btn-delete-product', function () {
            $(this).closest('tr').remove();
        });
    };
});
