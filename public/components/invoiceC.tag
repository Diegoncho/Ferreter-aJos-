<invoiceC>
    <div class="well well-sm">
        <div class="row">
            <div class="col-xs-6">
                <input id="proveedor_id" class="form-control" type="hidden" value="{proveedor_id}"/>
                <input id="proveedor" class="form-control typeahead" type="text" placeholder="Proveedor" />
            </div>
            <div class="col-xs-2">
                <input class="form-control" type="text" placeholder="Teléfono" readonly value="{telefono}" />
            </div>
            <div class="col-xs-4">
                <input class="form-control" type="text" placeholder="Dirección" readonly value="{direccion}" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-7">
            <input id="producto_id" class="form-control" type="hidden" value="{producto_id}"/>
            <input id="product" class="form-control" type="text" placeholder="Nombre del producto"/>
        </div>
        <div class="col-xs-2">
            <input id="quantity" class="form-control" type="number" min="1" pattern="^[0-9]+" placeholder="Cantidad"/>
        </div>
        <div class="col-xs-2">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">S/.</span>
                <input id="price" class="form-control" type="text" placeholder="Precio" value="{precio_costo}" readonly/>
            </div>
        </div>
        <div class="col-xs-1">
            <button onclick={__addProductToDetail} class="btn btn-primary form-control" id="btn-agregar">
                <i class="icon-add"></i>
            </button>
        </div>
    </div>

    <hr />

    <table class="table table-striped">
        <thead>
        <tr>
            <th style="width:40px;"></th>
            <th>Producto</th>
            <th class="text-right">Cantidad</th>
            <th class="text-right">P.U</th>
            <th class="text-right">Total</th>
        </tr>
        </thead>
        <tbody>
        <tr each={detail}>
            <td>
                <button onclick={__removeProductFromDetail} class="btn btn-danger btn-xs btn-block">X</button>
            </td>
            <td>{nombre}</td>
            <td class="text-right">{cantidad}</td>
            <td class="text-right">$ {precio_unitario.toFixed(2)}</td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td colspan="4" class="text-right"><b>IVA</b></td>
            <td class="text-right">$ {iva.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Sub Total</b></td>
            <td class="text-right">$ {subtotal.toFixed(2)}</td>
        </tr>
        <tr>
            <td colspan="4" class="text-right"><b>Total</b></td>
            <td class="text-right">$ {total.toFixed(2)}</td>
        </tr>
        </tfoot>
    </table>


    <button if={detail.length > 0 && proveedor_id > 0} onclick={__save} class="btn btn-default btn-lg btn-block">
        Guardar
    </button>

<script>
        var self = this;

        self.proveedor_id = 0;
        self.detail = [];
        self.iva = 0;
        self.subtotal = 0;
        self.total = 0;

        self.on('mount', function(){
            __proveedorAutocomplete();
            __productAutocomplete();
        })

        __removeProductFromDetail(e) {
            var item = e.item,
                index = this.detail.indexOf(item);

            this.detail.splice(index, 1);
            __calculate();
        }

        __addProductToDetail(){
            self.detail.push({
                id: parseFloat($("#producto_id").val()),
                nombre: $("#product").val(),
                cantidad:  parseFloat($("#quantity").val()),
                precio_unitario:  parseFloat($("#price").val()),
                total:  parseFloat($("#price").val() * $("#quantity").val())
            });

            console.log(self.detail)
            $("#producto_id").val(0);
            $("#product").val('');
            $("#quantity").val('');
            $("#price").val('');

            __calculate();
        }

        __save() {
            $.post(baseUrl('compraAdd'), {
                proveedor_id: self.proveedor_id,
                iva: self.iva,
                subtotal: self.subtotal,
                total: self.total,
                detail: self.detail
            }, function(r){
                if(r.response) {
                    window.location.href = baseUrl('compra');
                } else {
                    alert('Ocurrio un error');
                }
            }, 'json')
        }

        function __calculate(){
            var total = 0;

            self.detail.forEach(function(e){
                total += e.total;
            });

            self.total = total;
            self.subtotal = parseFloat(total / 1.18);
            self.iva = parseFloat(total - self.subtotal);
        }

        function __proveedorAutocomplete(){
            var proveedor = $("#proveedor"),
                options = {
                url: function(q){
                    return baseUrl('compra/findProveedor?q=' + q);
                },

                getValue: "nombre",
                list: {
                    onClickEvent: function() {
                        var e = proveedor.getSelectedItemData();
                        self.proveedor_id = e.id;
                        self.telefono = e.telefono;
                        self.direccion= e.direccion;
                        
                        self.update();
                    }
                }

            };

            proveedor.easyAutocomplete(options);
        }

        function __productAutocomplete(){
            var product = $("#product"),
                options = {
                url: function(q){
                    return baseUrl('factura/findProduct?q=' + q);
                },

                getValue: "nombre",
                list: {
                    onClickEvent: function() {
                        var e = product.getSelectedItemData();
                        self.producto_id = e.id;
                        self.precio_costo = e.precio_costo;
                        
                        self.update();
                    }
                }

            };

            product.easyAutocomplete(options);
        }
</script>

</invoiceC>
