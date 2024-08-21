<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Shop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">TechShop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Keranjang</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Pencarian Produk -->
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col">
                <form id="searchForm" class="form-inline justify-content-center">
                    <input class="form-control mr-sm-2" type="search"
                        placeholder="Cari Produk berdasarkan brand, model" aria-label="Search" id="searchInput"
                        style="width: 500px;">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                </form>
            </div>
        </div>

        <!-- Daftar Produk -->
        <div class="row" id="productList">
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p class="mb-0">&copy; 2024 TechShop. All rights reserved.</p>
        </div>
    </footer>

    <!-- jQuery dan Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            function loadProducts(keyword = '') {
                $.ajax({
                    url: '/api/products',
                    method: 'GET',
                    data: {
                        keyword: keyword
                    },
                    success: function(data) {
                        $('#productList').empty();
                        data.forEach(function(product) {
                            $('#productList').append(`
                <div class="col-md-4 mb-4">
                  <div class="card h-100">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="${product.brand}">
                    <div class="card-body">
                      <h5 class="card-title">${product.brand}</h5>
                      <p class="card-text">${product.model} | ${product.screen_size} </p>
                      <p class="card-text">${product.rating}</p>
                    </div>
                    <div class="card-footer">
                      <span class="text-primary font-weight-bold">${product.price}</span>
                      <a href="#" class="btn btn-sm btn-success float-right">Beli</a>
                    </div>
                  </div>
                </div>
              `);
                        });
                    },
                    error: function(err) {
                        console.log('Error:', err);
                    }
                });
            }

            // Panggil fungsi loadProducts() saat halaman dimuat
            loadProducts();

            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                const keyword = $('#searchInput').val();
                loadProducts(keyword);
            });
        });
    </script>

</body>

</html>
