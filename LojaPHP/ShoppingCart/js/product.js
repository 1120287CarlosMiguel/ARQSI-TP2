//----------------------------------------------------------------
// product class
/*
function product(sku, name, description, price, cal, carot, vitc, folate, potassium, fiber) {
    this.sku = sku; // product code (SKU = stock keeping unit)
    this.name = name;
    this.description = description;
    this.price = price;
    this.cal = cal;
    this.nutrients = {
        "Carotenoid": carot,
        "Vitamin C": vitc,
        "Folates": folate,
        "Potassium": potassium,
        "Fiber": fiber
    };
*/
function product(albumID, title, price, artist, genre, url, qtdStock) {
    this.albumID = albumID;
    this.title = title;
    this.price = price;
    this.artist = artist;
    this.genre = genre;
    this.url = url;
    this.qtdStock = qtdStock;
}
