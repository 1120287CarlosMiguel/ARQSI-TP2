//----------------------------------------------------------------
// store (contains the products)
//
// NOTE: nutritional info from http://www.cspinet.org/images/fruitcha.jpg
// score legend:
// 0: below 5% of daily value (DV)
// 1: 5-10% DV
// 2: 10-20% DV
// 3: 20-40% DV
// 4: above 40% DV
//
function store() {
    this.products = [
        <?php
            include '../../controller/AlbumController.php';
            /*
             *   new product("1", "Rock or Bust", 16, "AC DC", "Rock"),
        new product("2", "Thriller", 8.44, "Michael Jackson", "Pop, rock, R&B"),
        new product("3", "The Dark Side of the Moon", 11.99, "Pink Floyd", "Progressive rock"),
        new product("4", "Their Greatest Hits (1971–1975)", 8.44, "Eagles", "Rock, soft rock, folk rock")
             */?>
                
      ];
}
store.prototype.getProduct = function (albumID) {
    for (var i = 0; i < this.products.length; i++) {
        if (this.products[i].albumID == albumID)
            return this.products[i];
    }
    return null;
}