@extends('Master_page')

@section('title', $product->nom)

@section('content')
    <section class="product-detail">
        <style>
            .product-detail {
                background: #ffffff;
                padding: 50px;
                border-radius: 12px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.06);
                max-width: 900px;
                margin: 0 auto;
            }

            .back-link {
                display: inline-block;
                margin-bottom: 30px;
                color: #001f3f;
                text-decoration: none;
                font-weight: 500;
            }

            .back-link:hover {
                text-decoration: underline;
            }

            .product-detail-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 40px;
            }

            .product-image-wrapper {
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
                background: #f8f9fa;
                border-radius: 10px;
                padding: 20px;
                min-height: 400px;
            }

            .product-image {
                max-width: 100%;
                max-height: 400px;
                width: auto;
                height: auto;
                object-fit: contain;
                border-radius: 8px;
                box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            }

            .product-details {
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .product-details h1 {
                color: #001f3f;
                margin-bottom: 15px;
                font-size: 32px;
            }

            .product-details .category {
                color: #7a8fa0;
                font-size: 14px;
                margin-bottom: 15px;
            }

            .product-details .price {
                color: #dc3545;
                font-size: 28px;
                font-weight: bold;
                margin-bottom: 20px;
            }

            .product-details .description {
                color: #555;
                line-height: 1.6;
                margin-bottom: 30px;
                font-size: 16px;
            }

            .discount-badge {
                display: inline-block;
                background-color: #ffc107;
                color: #000;
                padding: 8px 15px;
                border-radius: 6px;
                margin-bottom: 20px;
                font-weight: bold;
            }

            .detail-actions {
                display: flex;
                gap: 15px;
                margin-top: 30px;
                flex-wrap: wrap;
            }

            .btn {
                padding: 12px 25px;
                border: none;
                border-radius: 6px;
                text-decoration: none;
                cursor: pointer;
                font-size: 15px;
                font-weight: 600;
                transition: all 0.3s;
                flex: 1;
                text-align: center;
            }

            .btn-edit {
                background-color: #ffc107;
                color: #000;
            }

            .btn-edit:hover {
                background-color: #e0a800;
            }

            .btn-delete {
                background-color: #dc3545;
                color: white;
            }

            .btn-delete:hover {
                background-color: #c82333;
            }

            .btn-back {
                background-color: #6c757d;
                color: white;
            }

            .btn-back:hover {
                background-color: #5a6268;
            }

            /* Custom Confirmation Modal */
            .delete-modal {
                display: none;
                position: fixed;
                z-index: 1000;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                animation: fadeIn 0.3s ease;
            }

            .delete-modal.show {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .modal-content {
                background-color: #ffffff;
                padding: 40px;
                border-radius: 12px;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
                max-width: 400px;
                width: 90%;
                animation: slideUp 0.3s ease;
            }

            .modal-icon {
                font-size: 48px;
                text-align: center;
                margin-bottom: 20px;
                color: #dc3545;
            }

            .modal-title {
                color: #001f3f;
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 15px;
                text-align: center;
            }

            .modal-text {
                color: #555;
                font-size: 16px;
                text-align: center;
                margin-bottom: 30px;
                line-height: 1.5;
            }

            .modal-actions {
                display: flex;
                gap: 15px;
            }

            .modal-btn {
                flex: 1;
                padding: 12px 20px;
                border: none;
                border-radius: 6px;
                font-size: 15px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s;
            }

            .modal-btn-cancel {
                background-color: #6c757d;
                color: white;
            }

            .modal-btn-cancel:hover {
                background-color: #5a6268;
            }

            .modal-btn-confirm {
                background-color: #dc3545;
                color: white;
            }

            .modal-btn-confirm:hover {
                background-color: #c82333;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }

            @keyframes slideUp {
                from {
                    transform: translateY(50px);
                    opacity: 0;
                }
                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            @media (max-width: 768px) {
                .product-detail-container {
                    grid-template-columns: 1fr;
                }

                .product-image-wrapper {
                    min-height: 300px;
                }

                .product-image {
                    max-height: 300px;
                }

                .detail-actions {
                    flex-direction: column;
                }

                .btn {
                    width: 100%;
                }
            }
        </style>

        <a href="/" class="back-link">← Retour aux produits</a>

        <div class="product-detail-container">
            <div class="product-image-wrapper">
                <img src="{{ $product->image }}" alt="{{ $product->nom }}" class="product-image">
            </div>

            <div class="product-details">
                <h1>{{ $product->nom }}</h1>
                <p class="category">Catégorie: <strong>{{ $product->categorie }}</strong></p>

                @if ($product->solde > 0)
                    <div class="discount-badge">Solde: {{ $product->solde }}% de réduction</div>
                @endif

                <p class="price">{{ $product->prix }} DH</p>

                <p class="description">{{ $product->description ?? 'Aucune description disponible.' }}</p>

                <div class="detail-actions">
                    <a href="{{ route('articles.edit', $product->id) }}" class="btn btn-edit">
                        Modifier
                    </a>
                    <form id="deleteForm" action="{{ route('articles.destroy', $product->id) }}" method="POST" style="flex: 1;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-delete" style="width: 100%;" onclick="showDeleteModal(event);">
                            Supprimer
                        </button>
                    </form>
                    <a href="/" class="btn btn-back">
                        Retour
                    </a>
                </div>
            </div>
        </div>

        <!-- Custom Delete Confirmation Modal -->
        <div id="deleteConfirmModal" class="delete-modal">
            <div class="modal-content">
                <div class="modal-icon">⚠️</div>
                <div class="modal-title">Confirmer la suppression</div>
                <div class="modal-text">
                    Êtes-vous sûr de vouloir supprimer ce produit? Cette action est irréversible.
                </div>
                <div class="modal-actions">
                    <button class="modal-btn modal-btn-cancel" onclick="closeDeleteModal();">
                        Annuler
                    </button>
                    <button class="modal-btn modal-btn-confirm" onclick="confirmDelete();">
                        Supprimer
                    </button>
                </div>
            </div>
        </div>

        <script>
            function showDeleteModal(event) {
                event.preventDefault();
                document.getElementById('deleteConfirmModal').classList.add('show');
            }

            function closeDeleteModal() {
                document.getElementById('deleteConfirmModal').classList.remove('show');
            }

            function confirmDelete() {
                document.getElementById('deleteForm').submit();
            }

            // Close modal when clicking outside
            window.onclick = function(event) {
                const modal = document.getElementById('deleteConfirmModal');
                if (event.target === modal) {
                    closeDeleteModal();
                }
            }
        </script>
    </section>
@endsection