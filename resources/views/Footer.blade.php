<footer class="footer">
    <style>
        .footer {
            background-color: #001f3f;
            color: #b8c5d0;
            text-align: center;
            padding: 20px 8%;
            font-size: 14px;
        }

        .footer span {
            color: #7a8fa0;
            font-weight: 600;
        }

        .footer a {
            color: #7a8fa0;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .footer {
                padding: 30px 4%;
            }
        }
    </style>

    <p>
        © {{ date('Y') }} <span>APEX - Desk Supply</span>. Tous droits réservés. | 
        <a href="{{ url('/a-propos') }}">À Propos</a> | 
        <a href="{{ url('/contact') }}">Contact</a>
    </p>
</footer>
