<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'title'            => 'Watchmen',
                'resume'           => "'Watchmen' de Alan Moore es una innovadora novela gráfica que reinventó el género de los superhéroes. Ambientada en un mundo distópico...",
                'full_description' => "En 'Watchmen', Alan Moore presenta una historia compleja y llena de giros inesperados que explora la psicología de los personajes y desafía las convenciones tradicionales de los superhéroes. Con una narrativa magistral y un arte impactante, esta obra maestra te sumerge en un universo provocativo lleno de poder, moralidad y responsabilidad. Prepárate para adentrarte en un viaje que ha dejado una marca duradera en la cultura popular.",
                'author_id'        => 1,
                'cover_image_path' => 'cover_watchmen.jpg',
                'hero_image_path'  => 'watchmen.webp',
                'price'            => 450.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => '1984',
                'resume'           => "'1984' de George Orwell es una obra maestra distópica que ha dejado una profunda huella en la literatura y el pensamiento social...",
                'full_description' => "En '1984', George Orwell nos transporta a un mundo totalitario y opresivo donde la libertad y la individualidad están amenazadas. A través de la historia de Winston Smith, Orwell expone los peligros del poder absoluto y la manipulación del lenguaje. Una novela visionaria que sigue siendo relevante en nuestros tiempos y nos invita a reflexionar sobre la vigilancia y el control gubernamental.",
                'author_id'        => 2,
                'cover_image_path' => 'cover_1984.jpg',
                'hero_image_path'  => 'hero_1984.webp',
                'price'            => 320.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'El Señor de los Anillos',
                'resume'           => "'El Señor de los Anillos' de J.R.R. Tolkien es una epopeya fantástica que ha cautivado a generaciones de lectores en todo el mundo...",
                'full_description' => "Sumérgete en el mundo de la Tierra Media con 'El Señor de los Anillos', la aclamada trilogía de J.R.R. Tolkien. A través de la historia de Frodo Bolsón y la Comunidad del Anillo, Tolkien nos transporta a un universo lleno de magia, peligro y heroísmo. Con su lenguaje detallado y su vasta mitología, esta obra épica sigue siendo un hito en la literatura fantástica y una fuente de inspiración para innumerables lectores.",
                'author_id'        => 3,
                'cover_image_path' => 'cover_lotr.jpg',
                'hero_image_path'  => 'hero_lotr.jpg',
                'price'            => 550.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Orgullo y prejuicio',
                'resume'           => "'Orgullo y prejuicio' de Jane Austen es una novela clásica que retrata la sociedad y las convenciones sociales del siglo XIX...",
                'full_description' => "En 'Orgullo y prejuicio', Jane Austen nos sumerge en la sociedad de la regencia inglesa y nos presenta a Elizabeth Bennet y Mr. Darcy, dos personajes con personalidades opuestas que chocan y se ven envueltos en malentendidos y prejuicios. A través de su ingeniosa narrativa, Austen examina temas como el amor, la clase social y el papel de la mujer en la sociedad. Esta cautivadora historia de amor y superación personal ha perdurado en el tiempo y se ha convertido en un clásico de la literatura.",
                'author_id'        => 4,
                'cover_image_path' => 'cover_pride_prejudice.jpg',
                'hero_image_path'  => 'hero_pride_prejudice.webp',
                'price'            => 280.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'Cien años de soledad',
                'resume'           => "'Cien años de soledad' de Gabriel García Márquez es una obra maestra del realismo mágico que narra la historia de la familia Buendía...",
                'full_description' => "Adéntrate en el mágico y enigmático mundo de Macondo con 'Cien años de soledad'. Gabriel García Márquez teje una trama fascinante que abarca generaciones, donde la realidad y lo fantástico se entrelazan. A través de los Buendía, García Márquez explora temas como el amor, la soledad, la guerra y el destino. Esta novela ha dejado una huella imborrable en la literatura latinoamericana y es un clásico indiscutible.",
                'author_id'        => 5,
                'cover_image_path' => 'cover_cien_anos_soledad.jpg',
                'hero_image_path'  => 'hero_cien_anos_soledad.jpg',
                'price'            => 420.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Matar a un ruiseñor',
                'resume'           => "'Matar a un ruiseñor' de Harper Lee es una novela conmovedora que aborda temas de injusticia racial y la pérdida de la inocencia...",
                'full_description' => "En 'Matar a un ruiseñor', Harper Lee nos presenta la historia de Scout, una niña que crece en el sur segregado de Estados Unidos. A través de los ojos de Scout, la novela examina cuestiones de raza, justicia y moralidad. Con una prosa emotiva y personajes inolvidables, Lee nos invita a reflexionar sobre los prejuicios y la lucha por la igualdad. Esta obra maestra ha dejado una profunda huella en la literatura y sigue siendo relevante en la actualidad.",
                'author_id'        => 6,
                'cover_image_path' => 'cover_matar_ruiseñor.jpg',
                'hero_image_path'  => 'hero_matar_ruisenor.jpg',
                'price'            => 320.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'Don Quijote de la Mancha',
                'resume'           => "'Don Quijote de la Mancha' de Miguel de Cervantes es una obra maestra de la literatura española que narra las aventuras de un hidalgo que se cree caballero andante...",
                'full_description' => "Embárcate en las disparatadas y heroicas aventuras de Don Quijote y Sancho Panza con la obra cumbre de Miguel de Cervantes. Esta novela es una sátira ingeniosa que cuestiona la idea de la realidad y la locura. A través del personaje de Don Quijote, Cervantes nos muestra la importancia de los ideales, el poder de la imaginación y el choque entre la fantasía y la realidad. Con un estilo único y lleno de humor, Cervantes nos brinda un retrato vívido de la sociedad y la condición humana. 'Don Quijote de la Mancha' es un clásico atemporal que ha dejado una huella imborrable en la literatura universal.",
                'author_id'        => 7,
                'cover_image_path' => 'cover_quijote.jpg',
                'hero_image_path'  => 'hero_quijote.jpg',
                'price'            => 400.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Crimen y castigo',
                'resume'           => "'Crimen y castigo' de Fyodor Dostoevsky es una novela psicológica que explora la culpa y la redención a través de la historia de un estudiante que comete un crimen...",
                'full_description' => "Adéntrate en la mente atormentada de Raskólnikov con 'Crimen y castigo'. Fyodor Dostoevsky nos sumerge en un profundo análisis psicológico mientras seguimos los pasos de un estudiante empobrecido que comete un asesinato. A través de esta obra maestra, Dostoevsky examina cuestiones filosóficas y morales, explorando el conflicto interno entre la culpa y la justificación. Con su prosa intensa y su complejidad emocional, 'Crimen y castigo' es una obra fundamental en la literatura rusa y mundial.",
                'author_id'        => 8,
                'cover_image_path' => 'cover_crimen_castigo.jpg',
                'hero_image_path'  => 'hero_crimen_castigo.webp',
                'price'            => 380.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'El gran Gatsby',
                'resume'           => "'El gran Gatsby' de F. Scott Fitzgerald es una novela emblemática de la década de 1920 que retrata la decadencia y los sueños rotos en la era del jazz...",
                'full_description' => "Sumérgete en la vibrante y deslumbrante era del jazz de la década de 1920 con 'El gran Gatsby'. F. Scott Fitzgerald nos transporta a un mundo de excesos, glamour y ambición a través de la historia de Jay Gatsby y su obsesión por recuperar un amor perdido. Con su prosa evocadora y su retrato crítico de la sociedad de la época, Fitzgerald nos invita a reflexionar sobre la ilusión del sueño americano y los costos de la búsqueda desenfrenada de la riqueza y la felicidad.",
                'author_id'        => 9,
                'cover_image_path' => 'cover_gran_gatsby.jpg',
                'hero_image_path'  => 'hero_gatsby.jpg',
                'price'            => 310.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'IT',
                'resume'           => "'IT' de Stephen King es un escalofriante y emocionante relato que ha aterrorizado a lectores de todo el mundo. Ambientada en el pueblo de Derry...",
                'full_description' => "Adéntrate en el aterrador mundo de 'IT' de Stephen King, donde el mal adopta la forma de un payaso llamado Pennywise. Ambientada en el pueblo de Derry, esta novela sigue a un grupo de niños que se enfrentan a sus peores pesadillas mientras luchan contra esta antigua entidad maligna. King nos sumerge en una historia de amistad, valentía y traumas infantiles, explorando temas profundos y oscuros. 'IT' es un clásico del horror que te mantendrá en vilo hasta la última página.",
                'author_id'        => 11,
                'cover_image_path' => 'cover_it.jpg',
                'hero_image_path'  => 'hero_it.jpg',
                'price'            => 410.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'V de Vendetta',
                'resume'           => "'V de Vendetta' de Alan Moore es una obra distópica que sigue la historia de un misterioso revolucionario conocido como V...",
                'full_description' => "En 'V de Vendetta', Alan Moore nos lleva a un futuro distópico donde un hombre enmascarado conocido como V lucha contra un gobierno totalitario. Esta novela gráfica es un cuento de rebeldía, anarquía y venganza, que desafía las normas establecidas y plantea preguntas sobre la libertad y la opresión. Con su estilo visualmente impactante, 'V de Vendetta' es una obra que no se olvida fácilmente.",
                'author_id'        => 1,
                'cover_image_path' => 'cover_vendetta.jpg',
                'hero_image_path'  => 'hero_vendetta.jpg',
                'price'            => 370.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'Rebelión en la granja',
                'resume'           => "'Rebelión en la granja' de George Orwell es una fábula alegórica que narra la revuelta de los animales de la Granja Manor contra la opresión de los humanos...",
                'full_description' => "Sumérgete en la alegoría política de 'Rebelión en la granja', donde los animales de la Granja Manor se rebelan contra la opresión de los humanos y establecen su propia sociedad. George Orwell utiliza esta fábula para explorar temas de poder, corrupción y la traición de las promesas revolucionarias. A través de los personajes de los animales, la novela arroja luz sobre los peligros del totalitarismo y el abuso de poder.",
                'author_id'        => 2,
                'cover_image_path' => 'cover_rebelion_granja.jpg',
                'hero_image_path'  => 'hero_rebelion.jpg',
                'price'            => 290.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'El amor en tiempos del cólera',
                'resume'           => "'El amor en tiempos del cólera' de Gabriel García Márquez es una novela que narra una historia de amor épica que perdura a lo largo de décadas...",
                'full_description' => "Embárcate en una épica historia de amor que atraviesa décadas con 'El amor en tiempos del cólera'. Gabriel García Márquez teje una narrativa de pasión y perseverancia a medida que los protagonistas, Florentino Ariza y Fermina Daza, se enfrentan a desafíos, distancias y la prueba del tiempo. Esta novela es un canto al poder del amor duradero y la capacidad de esperar toda una vida por el ser amado.",
                'author_id'        => 5,
                'cover_image_path' => 'cover_amor_tiempos_colera.jpg',
                'hero_image_path'  => 'hero_amor_en_tiempos_de_col.webp',
                'price'            => 360.0,
                'is_featured'      => 1,
            ],
        ];

        DB::table('books')->insert($books);
    }
}
