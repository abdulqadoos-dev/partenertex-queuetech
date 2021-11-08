<script>
    const allProducts = @json($products);
    let prodsIndex = document.getElementsByClassName('prods')[0].childElementCount;

    function removeHtmlById(id){
        document.getElementById(id).outerHTML = '';
    }
    function addNewProdRow(){
        let node = document.createElement('DIV');
        node.setAttribute('class', 'row my-2')
        node.setAttribute('id', "prod-row-"+prodsIndex)
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
                    <input type="number" min="0" required placeholder="quantity..." class="form-control" name="product_quantity[]" />
                </div>
                <div class="col-md-1">
                    <span class="fa fa-minus text-danger" onclick="removeHtmlById('prod-row-${prodsIndex}')"</span>
                </div>
            `;
        node.innerHTML = html;
        document.getElementsByClassName('prods')[0].appendChild(node)
        prodsIndex++;
    }

    const allBundles = @json($bundles);
    let bundlesIndex = document.getElementsByClassName('bundles')[0].childElementCount;

    function addNewBundleRow(){
        let node = document.createElement('DIV');
        node.setAttribute('class', 'row my-2')
        node.setAttribute('id', "bundle-row-"+bundlesIndex)
        let html = `
                    <div class="col-md-7">
                        <select class="form-control" name="bundle_id[]" required>
                            <option value="">select one</option>`;
        allBundles.forEach(prod => {
            html+=`<option value="${prod.id}">${prod.name}</option>`;
        })

        html += `</select>
                </div>
                <div class="col-md-4">
                    <input type="number" min="0" required placeholder="quantity..." class="form-control" name="bundle_quantity[]" />
                </div>
                <div class="col-md-1">
                    <span class="fa fa-minus text-danger" onclick="removeHtmlById('bundle-row-${bundlesIndex}')"</span>
                </div>
            `;
        node.innerHTML = html;
        document.getElementsByClassName('bundles')[0].appendChild(node)
        bundlesIndex++;
    }

    const allInventories = @json($inventories);
    let inventoriesIndex = document.getElementsByClassName('inventories')[0].childElementCount;

    function addNewInventoryRow(){
        let node = document.createElement('DIV');
        node.setAttribute('class', 'row my-2')
        node.setAttribute('id', "inventory-row-"+inventoriesIndex)
        let html = `
                    <div class="col-md-11">
                        <select class="form-control" name="inventory_id[]" required>
                            <option value="">select one</option>`;
        allInventories.forEach(prod => {
            html+=`<option value="${prod.id}">${prod.name}</option>`;
        })

        html += `</select>
                </div>
                <div class="col-md-1">
                    <span class="fa fa-minus text-danger" onclick="removeHtmlById('inventory-row-${inventoriesIndex}')"</span>
                </div>
            `;
        node.innerHTML = html;
        document.getElementsByClassName('inventories')[0].appendChild(node)
        inventoriesIndex++;
    }

</script>
