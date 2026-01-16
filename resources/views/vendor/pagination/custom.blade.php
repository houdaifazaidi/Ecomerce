@if ($paginator->hasPages())
<style>
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin: 40px auto 0;
        padding: 0;
        list-style: none;
        flex-wrap: wrap;
        width: 100%;
    }

    .page-item {
        list-style: none;
    }

    .page-link {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 40px;
        min-height: 40px;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 500;
        border: 1px solid #e0e6ed;
        border-radius: 6px;
        color: #001f3f;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .page-link:hover {
        background-color: #f0f4f8;
        border-color: #001f3f;
        color: #001f3f;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 31, 63, 0.1);
    }

    .page-item.active .page-link {
        background-color: #001f3f;
        color: #ffffff;
        border-color: #001f3f;
        font-weight: 600;
        box-shadow: 0 4px 12px rgba(0, 31, 63, 0.2);
    }

    .page-item.disabled .page-link {
        color: #b0bcc4;
        border-color: #e0e6ed;
        background-color: #f8f9fa;
        cursor: not-allowed;
        opacity: 0.6;
    }

    .page-item.disabled .page-link:hover {
        background-color: #f8f9fa;
        border-color: #e0e6ed;
        transform: none;
        box-shadow: none;
    }

    .pagination-info {
        text-align: center;
        margin: 20px auto 0;
        padding: 0;
        color: #666;
        font-size: 13px;
        width: 100%;
    }

    @media (max-width: 768px) {
        .pagination {
            gap: 4px;
        }

        .page-link {
            min-width: 36px;
            min-height: 36px;
            padding: 6px 10px;
            font-size: 12px;
        }
    }
</style>

<ul class="pagination">
    @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <span class="page-link" aria-disabled="true">← Précédent</span>
        </li>
    @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Page précédente">← Précédent</a>
        </li>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <li class="page-item disabled">
                <span class="page-link" aria-disabled="true">{{ $element }}</span>
            </li>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">{{ $page }}</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}" aria-label="Aller à la page {{ $page }}">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Page suivante">Suivant →</a>
        </li>
    @else
        <li class="page-item disabled">
            <span class="page-link" aria-disabled="true">Suivant →</span>
        </li>
    @endif
</ul>

<div class="pagination-info">
    Affichage de {{ $paginator->firstItem() }} à {{ $paginator->lastItem() }} sur {{ $paginator->total() }} résultats
</div>
@endif