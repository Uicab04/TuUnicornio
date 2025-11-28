<?php
// Configuración de headers
header('Content-Type: text/html; charset=UTF-8');

// Incluir archivos necesarios
require_once 'database.php';
require_once 'models/Solicitud.php';

// Cargar configuración
$config = require 'config.php';
$contactEmail = $config['contact_email'];
$siteName = $config['site_name'];
$siteSubtitle = $config['site_subtitle'];

// Procesamiento del formulario
$formMessage = "";
$messageType = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitizar datos
    $nombre = htmlspecialchars(trim($_POST['nombre'] ?? ''));
    $email = htmlspecialchars(trim($_POST['email'] ?? ''));
    $empresa = htmlspecialchars(trim($_POST['empresa'] ?? ''));
    $tipo = htmlspecialchars(trim($_POST['tipo'] ?? ''));
    $descripcion = htmlspecialchars(trim($_POST['descripcion'] ?? ''));
    
    // Validar email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formMessage = "Por favor, ingresa un email válido.";
        $messageType = "error";
    } elseif (empty($nombre) || empty($empresa) || empty($descripcion)) {
        $formMessage = "Por favor, completa todos los campos.";
        $messageType = "error";
    } else {
        // Guardar en base de datos
        $solicitud = new Solicitud();
        $resultado = $solicitud->guardar($nombre, $email, $empresa, $tipo, $descripcion);
        
        if ($resultado['success']) {
            // Preparar contenido del email
            $subject = "Nueva solicitud de web: " . $empresa;
            $bodyEmail = "
            Nombre: $nombre\n
            Email: $email\n
            Empresa: $empresa\n
            Tipo de web: $tipo\n
            Descripción del proyecto:\n
            $descripcion\n
            ---\n
            ID de solicitud: " . $resultado['id'] . "\n
            Mensaje enviado desde: " . $_SERVER['HTTP_HOST'];
            
            $headers = "From: $email\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
            // Enviar email (opcional, ya está guardado en BD)
            @mail($contactEmail, $subject, $bodyEmail, $headers);
            
            $formMessage = "¡Gracias! Hemos recibido tu solicitud. Nos contactaremos en 24 horas.";
            $messageType = "success";
            // Limpiar formulario
            $nombre = $email = $empresa = $tipo = $descripcion = "";
        } else {
            $formMessage = "Hubo un error al guardar tu solicitud. Por favor intenta de nuevo.";
            $messageType = "error";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Transformamos tu visión en realidad digital. Soluciones de software custom gratuitas para que tu negocio crezca sin límites.">
    <meta name="theme-color" content="#0A0E27">
    <title><?php echo $siteName; ?> - Web a Medida Gratis</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation Header -->
    <header class="header">
        <div class="container-fluid">
            <div class="header-content">
                <!-- Logo profesional Tu Unicornio -->
                <div class="logo-wrapper">
                    <!-- Reemplazar SVG inline por logo profesional real -->
                    <img src="logo.svg" alt="Tu Unicornio - Soluciones Geeks" class="logo-icon" />
                </div>
                <nav class="nav">
                    <a href="#proyectos" class="nav-link">Proyectos</a>
                    <a href="#servicios" class="nav-link">Servicios</a>
                    <a href="#solicitar" class="nav-link">Solicitar Web</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="hero-gradient-1"></div>
            <div class="hero-gradient-2"></div>
            <div class="hero-grid"></div>
        </div>
        
        <div class="container-fluid hero-content">
            <div class="hero-text">
                <div class="hero-badge">
                    <span class="badge-dot"></span>
                    <span>Freelancer con IA</span>
                </div>
                
                <h1 class="hero-title">
                    Tu sueño hecho
                    <span class="gradient-text">realidad digital</span>
                </h1>
                
                <p class="hero-description">
                    Creo webs profesionales gratis para tu negocio. Mientras tú creces, yo aprendo. Cuando logres éxito, monetizamos juntos. Cambios ilimitados y soporte permanente.
                </p>
                
                <div class="hero-buttons">
                    <a href="#solicitar" class="btn btn-primary">
                        <span>Solicitar Mi Web</span>
                        <span class="btn-arrow">→</span>
                    </a>
                    <a href="#proyectos" class="btn btn-outline">Ver Proyectos</a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-text">Gratis</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">∞</div>
                        <div class="stat-text">Cambios</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">24h</div>
                        <div class="stat-text">Respuesta</div>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="visual-card">
                    <div class="visual-header"></div>
                    <div class="visual-content">
                        <div class="visual-line"></div>
                        <div class="visual-line short"></div>
                        <div class="visual-line"></div>
                    </div>
                </div>
                <div class="floating-shape shape-1"></div>
                <div class="floating-shape shape-2"></div>
            </div>
        </div>
    </section>

    <!-- Projects Slider Section -->
    <section id="proyectos" class="projects-section">
        <div class="container-fluid">
            <div class="section-header">
                <h2 class="section-title">Mis Proyectos Destacados</h2>
                <p class="section-subtitle">Soluciones que han transformado negocios</p>
            </div>

            <div class="slider-wrapper">
                <div class="projects-slider">
                    <div class="project-slide">
                        <div class="project-image">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect fill='%23667EEA' width='400' height='300'/%3E%3Ctext x='50%' y='50%' text-anchor='middle' dy='.3em' fill='white' font-size='24' font-family='Arial'%3ETienda Online de Moda%3C/text%3E%3C/svg%3E" alt="Tienda Online">
                        </div>
                        <div class="project-info">
                            <h3>Tienda Online de Moda</h3>
                            <p>E-commerce con carrito de compras, pagos integrados y catálogo dinámico. Ventas 300% en 6 meses.</p>
                            <div class="project-tags">
                                <span class="tag">E-commerce</span>
                                <span class="tag">PHP</span>
                                <span class="tag">MySQL</span>
                            </div>
                        </div>
                    </div>

                    <div class="project-slide">
                        <div class="project-image">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect fill='%2348BB78' width='400' height='300'/%3E%3Ctext x='50%' y='50%' text-anchor='middle' dy='.3em' fill='white' font-size='24' font-family='Arial'%3EPortal de Servicios%3C/text%3E%3C/svg%3E" alt="Portal de Servicios">
                        </div>
                        <div class="project-info">
                            <h3>Portal de Servicios Profesionales</h3>
                            <p>Plataforma de citas, perfiles de profesionales, reseñas y pagos en línea. Conecta prestadores con clientes.</p>
                            <div class="project-tags">
                                <span class="tag">Marketplace</span>
                                <span class="tag">API</span>
                                <span class="tag">Pagos</span>
                            </div>
                        </div>
                    </div>

                    <div class="project-slide">
                        <div class="project-image">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect fill='%23F6AD55' width='400' height='300'/%3E%3Ctext x='50%' y='50%' text-anchor='middle' dy='.3em' fill='white' font-size='24' font-family='Arial'%3EPortafolio + Blog%3C/text%3E%3C/svg%3E" alt="Portafolio">
                        </div>
                        <div class="project-info">
                            <h3>Portafolio + Blog Profesional</h3>
                            <p>Sitio personal para creadores. Galería, blog de artículos, newsletter y formulario de contacto avanzado.</p>
                            <div class="project-tags">
                                <span class="tag">Portfolio</span>
                                <span class="tag">Blog</span>
                                <span class="tag">CMS</span>
                            </div>
                        </div>
                    </div>

                    <div class="project-slide">
                        <div class="project-image">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='300'%3E%3Crect fill='%23ED8936' width='400' height='300'/%3E%3Ctext x='50%' y='50%' text-anchor='middle' dy='.3em' fill='white' font-size='24' font-family='Arial'%3EApp de Gestión%3C/text%3E%3C/svg%3E" alt="Gestión">
                        </div>
                        <div class="project-info">
                            <h3>App de Gestión Empresarial</h3>
                            <p>Dashboard interactivo para administrar clientes, inventario, facturas y reportes automáticos en tiempo real.</p>
                            <div class="project-tags">
                                <span class="tag">Dashboard</span>
                                <span class="tag">Analytics</span>
                                <span class="tag">Admin Panel</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Controls -->
                <div class="slider-controls">
                    <button class="slider-btn prev" onclick="moveSlider(-1)">
                        <span class="arrow">←</span>
                    </button>
                    <div class="slider-dots">
                        <span class="dot active" onclick="goToSlide(0)"></span>
                        <span class="dot" onclick="goToSlide(1)"></span>
                        <span class="dot" onclick="goToSlide(2)"></span>
                        <span class="dot" onclick="goToSlide(3)"></span>
                    </div>
                    <button class="slider-btn next" onclick="moveSlider(1)">
                        <span class="arrow">→</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="servicios" class="services-section">
        <div class="container-fluid">
            <div class="section-header">
                <h2 class="section-title">Servicios Incluidos Gratis</h2>
                <p class="section-subtitle">Todo lo que necesitas para tener presencia digital profesional</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Diseño Personalizado</h3>
                    <p>Diseño único y profesional adaptado a tu marca y necesidades específicas</p>
                </div>

                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Optimización SEO</h3>
                    <p>Tu web posicionada en Google desde el primer día con SEO técnico de calidad</p>
                </div>

                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Responsive Design</h3>
                    <p>Perfecta en móvil, tablet y desktop. Experiencia fluida en cualquier dispositivo</p>
                </div>

                <div class="service-card">
                    <div class="service-number">04</div>
                    <h3>Hosting + Dominio</h3>
                    <p>Incluido hosting confiable y dominio profesional por tiempo limitado</p>
                </div>

                <div class="service-card">
                    <div class="service-number">05</div>
                    <h3>Velocidad Extreme</h3>
                    <p>Optimización de performance. Carga ultra rápida que convierte visitas en clientes</p>
                </div>

                <div class="service-card">
                    <div class="service-number">06</div>
                    <h3>Soporte Permanente</h3>
                    <p>Cambios, actualizaciones y mejoras ilimitadas. Estaré contigo siempre</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section id="solicitar" class="form-section">
        <div class="container-fluid">
            <div class="form-wrapper">
                <div class="form-header">
                    <h2>Solicita tu web gratis</h2>
                    <p>Cuéntame tu visión y yo crearé una web que transforme tu negocio. Respuesta garantizada en 24 horas.</p>
                </div>

                <!-- Mensaje de estado -->
                <?php if ($formMessage): ?>
                    <div class="alert alert-<?php echo $messageType; ?>">
                        <?php echo $formMessage; ?>
                        <button class="alert-close" onclick="this.parentElement.style.display='none';">✕</button>
                    </div>
                <?php endif; ?>

                <form method="POST" class="contact-form">
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Tu Nombre</label>
                            <input type="text" name="nombre" placeholder="Juan Pérez" value="<?php echo $_POST['nombre'] ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Tu Email</label>
                            <input type="email" name="email" placeholder="tu@email.com" value="<?php echo $_POST['email'] ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Nombre del Negocio</label>
                            <input type="text" name="empresa" placeholder="Mi empresa" value="<?php echo $_POST['empresa'] ?? ''; ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Tipo de Web</label>
                            <select name="tipo" required>
                                <option value="">Selecciona una opción</option>
                                <option value="ecommerce" <?php echo ($_POST['tipo'] ?? '') === 'ecommerce' ? 'selected' : ''; ?>>Tienda Online</option>
                                <option value="portfolio" <?php echo ($_POST['tipo'] ?? '') === 'portfolio' ? 'selected' : ''; ?>>Portafolio</option>
                                <option value="servicios" <?php echo ($_POST['tipo'] ?? '') === 'servicios' ? 'selected' : ''; ?>>Web de Servicios</option>
                                <option value="saas" <?php echo ($_POST['tipo'] ?? '') === 'saas' ? 'selected' : ''; ?>>Plataforma/SaaS</option>
                                <option value="otro" <?php echo ($_POST['tipo'] ?? '') === 'otro' ? 'selected' : ''; ?>>Otra solución</option>
                            </select>
                        </div>

                        <div class="form-group full">
                            <label>Cuéntame tu proyecto</label>
                            <textarea name="descripcion" rows="5" placeholder="¿Cuál es tu idea? ¿Qué necesitas? ¿Cuáles son tus objetivos?" required><?php echo $_POST['descripcion'] ?? ''; ?></textarea>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-large">
                        Enviar Solicitud
                    </button>
                </form>

                <div class="form-benefits">
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <p><strong>100% Gratis</strong> - Sin costo, sin sorpresas, sin letras chicas</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <p><strong>Contacto en 24h</strong> - Respuesta rápida y profesional siempre</p>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">✓</span>
                        <p><strong>Cambios Ilimitados</strong> - Actualizaciones y mejoras cuando las necesites</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="footer-content">
                <div class="footer-text">
                    <h3><?php echo $siteName; ?></h3>
                    <p>Transformando visiones en realidades digitales con tecnología y IA</p>
                </div>
                <div class="footer-contact">
                    <p>Email: <a href="mailto:<?php echo $contactEmail; ?>"><?php echo $contactEmail; ?></a></p>
                    <p>Respuesta garantizada en 24 horas</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 <?php echo $siteName; ?>. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>
