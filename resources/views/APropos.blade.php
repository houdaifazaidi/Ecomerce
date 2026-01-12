@extends('Master_page')

@section('title', 'À Propos - APEX')

@section('content')

<style>
    .apropos-hero {
        background: linear-gradient(135deg, #001f3f 0%, #003d5c 100%);
        color: white;
        padding: 80px 40px;
        border-radius: 16px;
        text-align: center;
        margin-bottom: 60px;
        box-shadow: 0 15px 50px rgba(0,31,63,0.2);
    }

    .apropos-hero h1 {
        font-size: 56px;
        margin-bottom: 15px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .apropos-hero .tagline {
        font-size: 22px;
        color: #a8d5ff;
        font-weight: 400;
        margin-bottom: 30px;
    }

    .apropos-hero .description {
        font-size: 18px;
        color: #d4e8f5;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .content-wrapper {
        max-width: 1100px;
        margin: 0 auto;
    }

    .section-block {
        margin-bottom: 70px;
    }

    .section-block h2 {
        font-size: 36px;
        color: #001f3f;
        margin-bottom: 10px;
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
    }

    .section-block h2::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, #001f3f, #7a8fa0);
        border-radius: 2px;
    }

    .section-intro {
        color: #7a8fa0;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 20px;
    }

    .section-block p {
        color: #555;
        font-size: 16px;
        line-height: 2;
        margin-bottom: 18px;
        text-align: justify;
    }

    .two-column {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        margin-top: 35px;
    }

    .two-column-item h3 {
        color: #001f3f;
        font-size: 22px;
        margin-bottom: 15px;
        font-weight: 600;
    }

    .two-column-item p {
        color: #666;
        line-height: 1.9;
        margin-bottom: 15px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 30px;
        margin: 40px 0;
    }

    .stat-card {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 30px;
        border-radius: 12px;
        text-align: center;
        border: 2px solid #e0e6ed;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        border-color: #001f3f;
        box-shadow: 0 10px 30px rgba(0,31,63,0.12);
    }

    .stat-number {
        font-size: 42px;
        color: #001f3f;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .stat-label {
        color: #7a8fa0;
        font-size: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        gap: 30px;
        margin: 40px 0;
    }

    .feature-card {
        background: white;
        border-radius: 12px;
        padding: 35px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.06);
        border-top: 4px solid #001f3f;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(0,31,63,0.15);
    }

    .feature-icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        color: #001f3f;
        margin-bottom: 12px;
        font-size: 20px;
        font-weight: 700;
    }

    .feature-card p {
        color: #666;
        margin: 0;
        font-size: 15px;
        line-height: 1.7;
    }

    .cta-section {
        background: linear-gradient(135deg, #001f3f 0%, #003d5c 100%);
        color: white;
        padding: 60px;
        border-radius: 14px;
        text-align: center;
        margin-top: 70px;
    }

    .cta-section h2 {
        color: white;
        font-size: 36px;
        margin-bottom: 10px;
    }

    .cta-section h2::after {
        background: #a8d5ff;
    }

    .cta-section p {
        color: #d4e8f5;
        font-size: 18px;
        margin-bottom: 30px;
        line-height: 1.8;
    }

    .cta-button {
        display: inline-block;
        background: white;
        color: #001f3f;
        padding: 15px 40px;
        border-radius: 8px;
        text-decoration: none;
        font-weight: 700;
        font-size: 16px;
        transition: all 0.3s;
        box-shadow: 0 4px 15px rgba(255,255,255,0.2);
    }

    .cta-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255,255,255,0.3);
    }

    @media (max-width: 768px) {
        .apropos-hero {
            padding: 50px 20px;
        }

        .apropos-hero h1 {
            font-size: 42px;
        }

        .two-column {
            grid-template-columns: 1fr;
            gap: 30px;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .section-block h2 {
            font-size: 28px;
        }

        .cta-section {
            padding: 40px 20px;
        }
    }
</style>

<div class="apropos-hero">
    <h1 style="color: white;">À Propos d'APEX</h1>
    <p class="tagline">Matériel de Bureau et Fournitures de Qualité</p>
    <p class="description">
        APEX est votre partenaire de confiance pour transformer votre espace de travail 
        en un environnement productif et confortable.
    </p>
</div>

<div class="content-wrapper">
    <!-- Notre Histoire -->
    {{-- <div class="section-block">
        <h2>Notre Histoire</h2>
        <p class="section-intro">Une décennie d'excellence et d'innovation</p>
        <p>
            Fondée en 2026, APEX Desk Supply a commencé avec une vision simple : fournir aux entreprises 
            et aux individus un accès facile à des produits de bureau de haute qualité à des prix justes. 
            Au fil des années, nous avons construit une réputation solide en tant que fournisseur fiable 
            et innovant dans le secteur du matériel de bureau au Maroc.
        </p>
        <p>
            Aujourd'hui, nous servons des milliers de clients satisfaits, des petites startups aux grandes 
            entreprises, en passant par les travailleurs indépendants et les étudiants. Notre croissance 
            constante est la preuve de notre engagement envers l'excellence et la satisfaction client.
        </p>
    </div> --}}

    {{-- <!-- Statistiques -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">10+</div>
            <div class="stat-label">Années d'Expérience</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">5K+</div>
            <div class="stat-label">Clients Satisfaits</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">1000+</div>
            <div class="stat-label">Produits Disponibles</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">100%</div>
            <div class="stat-label">Satisfaction Garantie</div>
        </div>
    </div> --}}

    <!-- Notre Mission -->
    <div class="section-block">
        <h2>Notre Mission</h2>
        <p class="section-intro">Créer des espaces de travail inspirants et productifs</p>
        <div class="two-column">
            <div class="two-column-item">
                <h3>Pour les Entreprises</h3>
                <p>
                    Nous aidons les entreprises à créer des environnements de travail qui favorisent 
                    la productivité et le bien-être de leurs collaborateurs. Nos solutions complètes 
                    en matériel de bureau et fournitures sont conçues pour répondre aux besoins spécifiques 
                    de chaque organisation.
                </p>
            </div>
            <div class="two-column-item">
                <h3>Pour les Individus</h3>
                <p>
                    Que vous soyez étudiant, travailleur indépendant ou professionnel, APEX vous propose 
                    une sélection de produits de qualité pour créer votre espace de travail idéal. 
                    Des fournitures scolaires aux mobiliers ergonomiques, nous avons tout ce qu'il vous faut.
                </p>
            </div>
        </div>
    </div>

    <!-- Nos Valeurs -->
    <div class="section-block">
        <h2>Nos Valeurs Fondamentales</h2>
        <p class="section-intro">Les principes qui guident nos actions</p>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">⭐</div>
                <h3>Excellence</h3>
                <p>
                    Nous sélectionnons rigoureusement chaque produit pour garantir la meilleure qualité 
                    et la plus grande durabilité.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">💰</div>
                <h3>Équité Tarifaire</h3>
                <p>
                    Des prix compétitifs et transparents sans compromis sur la qualité. 
                    Nous croyons en une tarification juste pour tous.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🤝</div>
                <h3>Service Client</h3>
                <p>
                    Notre équipe dévouée est disponible pour répondre à vos questions et vous offrir 
                    un conseil expert personnalisé.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Rapidité</h3>
                <p>
                    Livraison rapide et efficace sur tout le Maroc. Nous respectons nos délais 
                    et assurons une mise en livraison fiable.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">♻️</div>
                <h3>Responsabilité</h3>
                <p>
                    Engagés pour un avenir durable, nous favorisons les produits éco-responsables 
                    et les pratiques durables.
                </p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Innovation</h3>
                <p>
                    Nous restons à la pointe des tendances et innovations du secteur du mobilier 
                    et des fournitures de bureau.
                </p>
            </div>
        </div>
    </div>

    <!-- Pourquoi Nous Choisir -->
    <div class="section-block">
        <h2>Pourquoi Choisir APEX ?</h2>
        <p class="section-intro">Ce qui nous rend différents</p>
        <div class="two-column">
            <div class="two-column-item">
                <h3>Expertise et Connaissance</h3>
                <p>
                    Avec plus de 10 ans d'expérience, notre équipe maîtrise les subtilités du marché. 
                    Nous vous conseillons sur les meilleures solutions pour vos besoins spécifiques.
                </p>
            </div>
            <div class="two-column-item">
                <h3>Partenaires de Confiance</h3>
                <p>
                    Nous travaillons avec les meilleures marques internationales pour vous proposer 
                    une gamme complète de produits fiables et performants.
                </p>
            </div>
        </div>
        <div class="two-column" style="margin-top: 30px;">
            <div class="two-column-item">
                <h3>Disponibilité et Suivi</h3>
                <p>
                    Votre satisfaction est notre priorité. Nous offrons un suivi après-vente et 
                    sommes toujours disponibles pour vos questions ou demandes spéciales.
                </p>
            </div>
            <div class="two-column-item">
                <h3>Catalogue Complet</h3>
                <p>
                    De la fourniture la plus basique au mobilier sophistiqué, APEX propose 
                    une gamme complète pour tous vos besoins professionnels.
                </p>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div class="cta-section">
        <h2>Prêt à Transformer Votre Espace de Travail ?</h2>
        <p>Explorez notre catalogue complet ou contactez-nous pour des conseils personnalisés</p>
        <a href="{{ url('/contact') }}" class="cta-button">Nous Contacter</a>
    </div>
</div>

@endsection
