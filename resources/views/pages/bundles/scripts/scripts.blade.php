<script>
    const allProducts = @json($products);
    let index = document.getElementsByClassName('bundle-prods')[0].childElementCount;

    function removeHtmlById(id){
        document.getElementById(id).outerHTML = '';
    }
    function addNewProdRow(){
        let node = document.createElement('DIV');
        node.setAttribute('class', 'row mt-2')
        node.setAttribute('id', "prod-row-"+index)
        let html = `
                    <div class="col-md-7">
                        <select class="form-control" name="product_id[]" required>
                            <option value="">select one</option>`;
        allProducts.forEach(prod => {
            html+=`<option value="${prod.id}">${prod.name}</option>`;
        })

        html += `</select>
                </div>
                <div class="col-md-4">
                    <input type="number" min="0" required placeholder="quantity..." class="form-control" name="quantity[]"  value="{{$data->unit ??  old('unit')}}">
                </div>
                <div class="col-md-1">
                    <span class="fa fa-minus text-danger" onclick="removeHtmlById('prod-row-${index}')"</span>
                </div>
            `;
        node.innerHTML = html;
        document.getElementsByClassName('bundle-prods')[0].appendChild(node)
        index++;
    }



</script>
