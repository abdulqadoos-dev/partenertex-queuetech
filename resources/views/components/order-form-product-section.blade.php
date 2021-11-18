<div id="orderFormProductHtml">
    <div class="row align-items-end my-4">
        <div class="col-lg-6">
            <label class="form-label">Product</label>
            <select class="form-control" onchange="handleOnChangeProductValues(this,{{$products}})" name="product_id[]">
                <option>-- select --</option>
                @foreach($products ?? [] as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4">
            <label class="form-label">Quantity</label>
            <input type="number" min="1" class="form-control" name="product_quantity[]" value="1"/>
        </div>
        <div class="col-lg-2">
            <span class="btn btn-danger w-100" onclick="removeProductRow(this)">Remove</span>
        </div>
        <div class="col-lg-12">
            <div class="row my-4">
                <div class="col">
                    <label class="form-label">Dimensions</label>
                    <input type="text" class="form-control" id="dimensions" disabled value="">
                </div>
                <div class="col">
                    <label class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="unitPrice" disabled value="">
                </div>
                <div class="col">
                    <label class="form-label">Stock</label>
                    <input type="text" class="form-control" id="stock" disabled value="">
                </div>
            </div>
        </div>
    </div>
</div>

<div id="orderFormProductSection"></div>

<script>
    let productHtml, productSection;

    document.addEventListener("DOMContentLoaded", function () {
        productHtml = $("#orderFormProductHtml").html();
        productSection = $("#orderFormProductSection");
    });

    const handleOnChangeProductValues = (e, products) => {
        let id = $(e).find(":selected").val();
        let product = products.filter(p => (p.id === parseInt(id)));
        if(product.length){
            product = product.shift();
            let main = $(e).parent().parent();
            main.find("#dimensions").val(product.id);
            main.find("#unitPrice").val(product.unit_sale_price);
            main.find("#stock").val(product.stock);
        }

    }

    const addProductRow = () => productSection.append(productHtml)
    const removeProductRow = e => $(e).parent().parent().remove();


</script>
