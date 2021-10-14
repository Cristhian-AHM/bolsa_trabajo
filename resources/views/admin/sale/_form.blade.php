

<div class="form-group">
  <label for="code">Código de barras</label>
  <input type="text" name="code" id="code" class="form-control" placeholder="" aria-describedby="helpId">
</div>

  <div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">Producto</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>Selecccione un producto</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled>
          </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="price">Precio de venta</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
        </div>
    </div>
  </div>




  <div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="tax">Impuesto</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">%</span>
            </div>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="basic-addon3" value="18">
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="discount">Porcentaje de descuento</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon2">%</span>
            </div>
            <input type="number" class="form-control" name="discount" id="discount" aria-describedby="basic-addon2" value="0">
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">Tipo de pago</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="type" id="type">
                <option value="" disabled selected>Selecccione un tipo de pago</option>
                <option value="Peso Méxicano">Peso Méxicano</option>
                <option value="Dólares">Dólares</option>
                <option value="Tarjeta">Tarjeta</option>
            </select>
        </div>
    </div>
    <div class="form-group col-md-2" id="dolar_price_div">
        <label for="discount">Precio del Dólar</label>
        <div class="form-group">
            <input type="number" class="form-control" id="dolar_price" aria-describedby="basic-addon2" value="19" step="0.01">
        </div>
    </div>
  </div>







<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
</div>
<div class="form-group">
    <h4 class="card-title">Detalles de venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio Venta</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">0.00 $</span> </p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (18%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">0.00 $</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p align="right"><span align="right" id="total_pagar_html">0.00 $</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>