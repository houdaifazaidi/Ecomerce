@extends('Master_page')

@section('title', 'Contact - APEX')

@section('content')

<section class="contact">
    <style>
        .contact {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            padding: 50px;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            max-width: 1000px;
            margin: 0 auto;
        }

        .contact h1 {
            font-size: 48px;
            color: #001f3f;
            margin-bottom: 12px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .contact .subtitle {
            color: #7a8fa0;
            font-size: 20px;
            margin-bottom: 40px;
            font-weight: 500;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-top: 30px;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .info-item {
            display: flex;
            gap: 20px;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-left: 4px solid #001f3f;
            transition: all 0.3s;
        }

        .info-item:hover {
            box-shadow: 0 6px 16px rgba(0,31,63,0.1);
            transform: translateY(-2px);
        }

        .info-icon {
            font-size: 32px;
            flex-shrink: 0;
        }

        .info-content h3 {
            color: #001f3f;
            margin: 0 0 8px 0;
            font-size: 18px;
            font-weight: 600;
        }

        .info-content p {
            margin: 0;
            color: #666;
            font-size: 15px;
            line-height: 1.6;
        }

        .info-content a {
            color: #001f3f;
            font-weight: 500;
        }

        .info-content a:hover {
            color: #7a8fa0;
        }

        .contact-form {
            background: #ffffff;
            padding: 35px;
            border-radius: 12px;
            border-left: 5px solid #001f3f;
            box-shadow: 0 3px 12px rgba(0,0,0,0.06);
        }

        .contact-form h3 {
            color: #001f3f;
            margin-top: 0;
            margin-bottom: 25px;
            font-size: 22px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            color: #001f3f;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 15px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 13px 15px;
            border: 1px solid #d4dce8;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            transition: all 0.3s;
            background-color: #f8f9fa;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #001f3f;
            background-color: #ffffff;
            box-shadow: 0 0 0 4px rgba(0, 31, 63, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .submit-btn {
            background-color: #001f3f;
            color: white;
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #7a8fa0;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,31,63,0.2);
        }

        @media (max-width: 768px) {
            .contact-container {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <h1>Contactez-Nous</h1>
    <p class="subtitle">Nous sommes à votre écoute pour toute question</p>

    <div class="contact-container">
        <div class="contact-info">
            <div class="info-item">
                <div class="info-icon">📍</div>
                <div class="info-content">
                    <h3>Adresse</h3>
                    <p>123 Avenue Mohamed V<br>Casablanca 20000<br>Maroc</p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📞</div>
                <div class="info-content">
                    <h3>Téléphone</h3>
                    <p><a href="tel:+212522123456">+212 5 22 12 34 56</a><br>
                    <a href="tel:+212661234567">+212 6 61 23 45 67</a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">📧</div>
                <div class="info-content">
                    <h3>Email</h3>
                    <p><a href="mailto:info@apexdesksupply.ma">info@apexdesksupply.ma</a><br>
                    <a href="mailto:support@apexdesksupply.ma">support@apexdesksupply.ma</a></p>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">⏰</div>
                <div class="info-content">
                    <h3>Horaires</h3>
                    <p>Lun-Ven: 8h00 - 18h00<br>
                    Sam: 9h00 - 17h00<br>
                    Dimanche: Fermé</p>
                </div>
            </div>
        </div>

        <div class="contact-form">
            <h3 style="color: #001f3f; margin-top: 0;">Envoyez-nous un Message</h3>
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nom">Nom Complet *</label>
                    <input type="text" id="nom" name="nom" required>
                </div>

                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-group">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" id="telephone" name="telephone">
                </div>

                <div class="form-group">
                    <label for="sujet">Sujet *</label>
                    <input type="text" id="sujet" name="sujet" required>
                </div>

                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" required></textarea>
                </div>

                <button type="submit" class="submit-btn">Envoyer le Message</button>
            </form>
        </div>
    </div>

</section>

@endsection
