<?php
$categoria = $_GET['categoria'];

$catalogo = [
    "Acabados" => [
        ["nombre" => "Pintura", "descripcion" => "Pintura para interiores y exteriores de alta calidad, disponible en varios colores."],
        ["nombre" => "Azulejos", "descripcion" => "Azulejos de cerámica y porcelana en diversos diseños y tamaños."],
        ["nombre" => "Barniz", "descripcion" => "Barniz para madera y metal, ofrece protección y acabado brillante."],
        ["nombre" => "Yeso", "descripcion" => "Yeso para acabados de construcción, ideal para paredes y techos."],
        ["nombre" => "Empapelado", "descripcion" => "Empapelado decorativo en varios estilos y texturas."],
        ["nombre" => "Cemento Blanco", "descripcion" => "Cemento blanco para acabados finos y decorativos."],
        ["nombre" => "Pasta Muro", "descripcion" => "Pasta para muros, perfecta para alisar superficies antes de pintar."],
        ["nombre" => "Sellador", "descripcion" => "Sellador para juntas y grietas, ideal para prevenir filtraciones."]
    ],
    "Construcción" => [
        ["nombre" => "Cemento", "descripcion" => "Cemento para construcción de alta resistencia, ideal para estructuras."],
        ["nombre" => "Arena", "descripcion" => "Arena fina y gruesa para mezclas de concreto y mortero."],
        ["nombre" => "Grava", "descripcion" => "Grava para construcción, usada en la fabricación de concreto."],
        ["nombre" => "Ladrillos", "descripcion" => "Ladrillos de arcilla y concreto para muros y estructuras."],
        ["nombre" => "Varilla", "descripcion" => "Varilla de acero para refuerzo de concreto."],
        ["nombre" => "Bloques de Hormigón", "descripcion" => "Bloques de hormigón para construcción de muros."],
        ["nombre" => "Tuberías PVC", "descripcion" => "Tuberías de PVC para instalaciones de agua y desagües."],
        ["nombre" => "Malla de Acero", "descripcion" => "Malla de acero para refuerzo en construcciones de concreto."]
    ],
    "Hogar" => [
        ["nombre" => "Muebles", "descripcion" => "Muebles para el hogar, incluyendo sofás, mesas y sillas."],
        ["nombre" => "Electrodomésticos", "descripcion" => "Electrodomésticos de cocina como refrigeradores, estufas y microondas."],
        ["nombre" => "Decoración", "descripcion" => "Artículos de decoración para el hogar, como cuadros y jarrones."],
        ["nombre" => "Iluminación", "descripcion" => "Lámparas y sistemas de iluminación para interiores y exteriores."],
        ["nombre" => "Ropa de Cama", "descripcion" => "Sábanas, cobertores y almohadas de alta calidad."],
        ["nombre" => "Utensilios de Cocina", "descripcion" => "Utensilios de cocina como ollas, sartenes y cubiertos."],
        ["nombre" => "Cortinas", "descripcion" => "Cortinas y persianas en varios diseños y tamaños."],
        ["nombre" => "Alfombras", "descripcion" => "Alfombras decorativas para diferentes espacios del hogar."]
    ],
    "Herramientas" => [
        ["nombre" => "Taladro", "descripcion" => "Taladro eléctrico con múltiples velocidades y brocas intercambiables."],
        ["nombre" => "Martillo", "descripcion" => "Martillo de acero de alta resistencia para trabajos pesados."],
        ["nombre" => "Llave inglesa", "descripcion" => "Llave inglesa ajustable de diferentes tamaños."],
        ["nombre" => "Sierra", "descripcion" => "Sierra manual y eléctrica para cortar madera y metal."],
        ["nombre" => "Destornilladores", "descripcion" => "Juego de destornilladores de varios tipos y tamaños."],
        ["nombre" => "Alicate", "descripcion" => "Alicates multifuncionales para corte y sujeción."],
        ["nombre" => "Cinta Métrica", "descripcion" => "Cinta métrica de precisión para medir superficies y distancias."],
        ["nombre" => "Nivel de Burbuja", "descripcion" => "Nivel de burbuja para asegurar superficies planas y niveladas."]
    ]
];

header('Content-Type: application/json');
echo json_encode($catalogo[$categoria]);
