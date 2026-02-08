@extends('Master_page')

@section('title', 'Mon Panier')

@section('content')
<div class="cart-wrapper">
    <style>
        .cart-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .cart-header {
            margin-bottom: 30px;
            text-align: center;
        }

        .cart-header h1 {
            color: #001f3f;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .cart-header p {
            color: #6c757d;
            font-size: 1.1rem;
        }

        .cart-content {
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 30px;
            align-items: start;
        }

        /* Cart Items Section */
        .cart-items-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #f0f0f0;
        }

        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .cart-table th {
            background-color: #f8f9fa;
            color: #001f3f;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            padding: 20px;
            text-align: left;
            border-bottom: 2px solid #eef2f7;
        }

        .cart-table td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
        }

        .cart-table tr:last-child td {
            border-bottom: none;
        }

        .cart-table tr:hover {
            background-color: #fafbfc;
        }

        /* Product Cell */
        .product-cell {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .cart-img-wrapper {
            width: 80px;
            height: 80px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            flex-shrink: 0;
        }

        .cart-item-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product-name {
            font-weight: 600;
            color: #001f3f;
            font-size: 1.05rem;
            display: block;
            margin-bottom: 5px;
        }

        .product-meta {
            color: #8898aa;
            font-size: 0.9rem;
        }

        /* Quantity Input */
        .quantity-wrapper {
            display: inline-flex;
            align-items: center;
            background: #f8f9fa;
            border-radius: 50px;
            border: 1px solid #e0e6ed;
            padding: 4px;
        }

        .quantity-input {
            width: 50px;
            text-align: center;
            border: none;
            background: transparent;
            font-weight: 600;
            color: #001f3f;
            font-size: 1rem;
        }

        .quantity-input:focus {
            outline: none;
        }

        /* Price */
        .price-text {
            font-weight: 700;
            color: #2d3748;
            font-size: 1.1rem;
        }

        .subtotal-text {
            font-weight: 800;
            color: #001f3f;
            font-size: 1.1rem;
        }

        /* Actions */
        .btn-action {
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.2s;
            font-size: 1.2rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-refresh {
            color: #3298dc;
            margin-right: 5px;
        }

        .btn-refresh:hover {
            background-color: #f0f9ff;
            color: #0056b3;
        }

        .btn-delete {
            color: #e3342f;
        }

        .btn-delete:hover {
            background-color: #fff5f5;
            color: #cc1f1a;
        }

        /* Order Summary Card */
        .summary-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            padding: 30px;
            border: 1px solid #f0f0f0;
            position: sticky;
            top: 20px;
        }

        .summary-header {
            font-size: 1.25rem;
            font-weight: 700;
            color: #001f3f;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            color: #6c757d;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid #f0f0f0;
            font-size: 1.5rem;
            font-weight: 800;
            color: #001f3f;
        }

        .btn-checkout-primary {
            display: block;
            width: 100%;
            padding: 15px;
            background: #28a745;
            color: white;
            text-align: center;
            border-radius: 10px;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 25px;
            text-decoration: none;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
        }

        .btn-checkout-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(40, 167, 69, 0.4);
            background: #218838;
        }

        .btn-continue-shopping {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #6c757d;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .btn-continue-shopping:hover {
            color: #001f3f;
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            display: block;
            color: #e0e6ed;
        }

        .btn-start-shopping {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #001f3f;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-start-shopping:hover {
            background: #003366;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .cart-content {
                grid-template-columns: 1fr;
            }
            
            .summary-card {
                position: static;
                margin-top: 20px;
            }
        }

        @media (max-width: 768px) {
            .cart-table thead {
                display: none; /* Hide header on mobile for card-like view */
            }

            .cart-table, .cart-table tbody, .cart-table tr, .cart-table td {
                display: block;
                width: 100%;
            }

            .cart-table tr {
                margin-bottom: 20px;
                border-bottom: 1px solid #eee;
                padding-bottom: 20px;
            }

            .cart-table td {
                text-align: right;
                padding: 10px 20px;
                position: relative;
                border-bottom: none;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .cart-table td::before {
                content: attr(data-label);
                font-weight: 600;
                color: #8898aa;
                text-transform: uppercase;
                font-size: 0.8rem;
                display: block;
            }

            .product-cell {
                justify-content: flex-end; /* Align product info to right on mobile rows */
            }
            
            .table-responsive {
                overflow: visible; /* Disable scroll, use stacked layout */
            }
        }
    </style>

    <div class="cart-header">
        <h1>Votre Panier</h1>
        <p>Gérez vos articles et passez à la caisse</p>
    </div>

    @if(session('cart'))
        <div class="cart-content">
            <!-- Cart Items -->
            <div class="cart-items-card">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th style="width: 45%;">Produit</th>
                                <th>Prix</th>
                                <th>Quantité</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @foreach(session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <tr data-id="{{ $id }}">
                                    <td data-label="Produit">
                                        <div class="product-cell">
                                            <div class="cart-img-wrapper">
                                                <img src="{{ $details['image'] }}" class="cart-item-image" alt="{{ $details['name'] }}" />
                                            </div>
                                            <div style="text-align: left;">
                                                <h3 class="product-name">{{ $details['name'] }}</h3>
                                                <span class="product-meta">Ref: #{{ $id }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Prix">
                                        <span class="price-text">{{ $details['price'] }} DH</span>
                                    </td>
                                    <td data-label="Quantité">
                                        <div class="quantity-wrapper">
                                            <input type="number" value="{{ $details['quantity'] }}" class="quantity-input quantity" min="1">
                                        </div>
                                    </td>
                                    <td data-label="Total">
                                        <span class="subtotal-text">{{ $details['price'] * $details['quantity'] }} DH</span>
                                    </td>
                                    <td data-label="Actions">
                                        <div style="display: flex; gap: 10px; justify-content: flex-end; align-items: center;">
                                            <button class="btn-action btn-refresh update-cart" data-id="{{ $id }}" title="Mettre à jour">
                                                🔄
                                            </button>
                                            <button class="btn-action btn-delete remove-from-cart" data-id="{{ $id }}" title="Supprimer">
                                                🗑️
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="summary-card">
                <h3 class="summary-header">Résumé de la commande</h3>
                <div class="summary-row">
                    <span>Sous-total</span>
                    <span>{{ $total }} DH</span>
                </div>
                <div class="summary-row">
                    <span>Livraison</span>
                    <span style="color: #28a745;">Gratuit</span>
                </div>
                <div class="summary-total">
                    <span>Total</span>
                    <span>{{ $total }} DH</span>
                </div>
                
                <a href="#" class="btn-checkout-primary">
                    Passer la commande 
                </a>
                
                <a href="{{ url('/') }}" class="btn-continue-shopping">
                    Continuer vos achats
                </a>
            </div>
        </div>
    @else
        <div class="cart-items-card empty-state">
            <span class="empty-icon">🛒</span>
            <h3>Votre panier est vide</h3>
            <p>Il semble que vous n'ayez pas encore ajouté de produits.</p>
            <a href="{{ url('/') }}" class="btn-start-shopping">Commencer vos achats</a>
        </div>
    @endif
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(".update-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        var tr = ele.closest("tr");
        
        // Add loading state
        ele.html('⏳').prop('disabled', true);
        
        $.ajax({
            url: '{{ route('update_cart') }}',
            method: "PATCH",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.attr("data-id"), 
                quantity: tr.find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            },
            error: function() {
                ele.html('🔄').prop('disabled', false);
                alert('Erreur lors de la mise à jour');
            }
        });
    });

    $(".remove-from-cart").click(function (e) {
        e.preventDefault();

        var ele = $(this);

        if(confirm("Êtes-vous sûr de vouloir supprimer ce produit ?")) {
            $.ajax({
                url: '{{ route('remove_from_cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        }
    });

    // Auto-update on Enter key in quantity input
    $(".quantity-input").keypress(function(e) {
        if(e.which == 13) {
            $(this).closest('tr').find('.update-cart').click();
        }
    });
</script>
@endsection
