@extends('Master_page')

@section('title', 'À Propos - APEX')

@section('content')

<section class="apropos">
    <style>
        .apropos {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            max-width: 950px;
            margin: 0 auto;
        }

        .apropos h1 {
            font-size: 48px;
            color: #001f3f;
            margin-bottom: 12px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .apropos .subtitle {
            color: #7a8fa0;
            font-size: 20px;
            margin-bottom: 40px;
            font-weight: 500;
        }

        .apropos h2 {
            color: #001f3f;
            margin-top: 40px;
            margin-bottom: 20px;
            border-bottom: 3px solid #001f3f;
            padding-bottom: 12px;
            font-size: 24px;
            font-weight: 600;
        }

        .apropos p {
            color: #555;
            line-height: 1.8;
            margin-bottom: 15px;
            text-align: justify;
            font-size: 16px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 25px;
            margin: 30px 0;
        }

        .feature-card {
            background: #ffffff;
            border-left: 5px solid #001f3f;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .feature-card:hover {
            transform: translateX(8px);
            box-shadow: 0 8px 24px rgba(0,31,63,0.12);
        }

        .feature-card h3 {
            color: #001f3f;
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 600;
        }

        .feature-card p {
            color: #666;
            margin: 0;
            font-size: 15px;
            line-height: 1.6;
        }
    </style>

    <h1>À Propos d'APEX</h1>
    <p class="subtitle">Votre partenaire de confiance pour le matériel de bureau</p>

    <h2>Qui Sommes-Nous</h2>
    <p>
        APEX est votre spécialiste du matériel de bureau et des fournitures depuis plus de 10 ans. 
        Nous nous engageons à fournir des produits de qualité supérieure à des prix compétitifs, 
        pour répondre à tous vos besoins professionnels et personnels.
    </p>

    <h2>Notre Mission</h2>
    <p>
        Notre mission est de faciliter votre quotidien en vous proposant une sélection rigoureuse 
        de produits de bureau. Nous croyons que le mobilier et les fournitures de qualité contribuent 
        à la productivité et au bien-être au travail.
    </p>

    <h2>Nos Valeurs</h2>
    <div class="features">
        <div class="feature-card">
            <h3>Qualité</h3>
            <p>Nous sélectionnons rigoureusement chaque produit pour garantir votre satisfaction.</p>
        </div>
        <div class="feature-card">
            <h3>Prix Juste</h3>
            <p>Des prix compétitifs sans compromis sur la qualité.</p>
        </div>
        <div class="feature-card">
            <h3>Service Client</h3>
            <p>Une équipe disponible pour répondre à vos questions et besoins spécifiques.</p>
        </div>
        <div class="feature-card">
            <h3>Livraison Rapide</h3>
            <p>Livraison express sur tout le Maroc.</p>
        </div>
    </div>

    <h2>Pourquoi Nous Choisir</h2>
    <p>
        Chez APEX Desk Supply, nous offrons bien plus qu'une simple vente de produits. 
        Nous construisons une relation de long terme avec nos clients en leur fournissant 
        des solutions adaptées à leurs besoins spécifiques. Notre équipe expérimentée est 
        toujours prête à vous conseiller pour choisir les meilleurs produits.
    </p>

    <h2>Contactez-Nous</h2>
    <p>
        N'hésitez pas à nous contacter pour toute question ou demande spéciale. 
        Visitez notre page <a href="{{ url('/contact') }}">Contact</a> pour nous joindre.
    </p>

</section>

@endsection
