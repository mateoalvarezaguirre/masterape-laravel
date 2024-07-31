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
                'resume'           => "'Watchmen' by Alan Moore is an innovative graphic novel that reinvented the superhero genre. Set in a dystopian world...",
                'full_description' => "In 'Watchmen', Alan Moore presents a complex story full of unexpected twists that explores the psychology of the characters and challenges traditional superhero conventions. With masterful storytelling and impactful art, this masterpiece immerses you in a provocative universe full of power, morality, and responsibility. Prepare to delve into a journey that has left a lasting mark on popular culture.",
                'author_id'        => 1,
                'cover_image_path' => 'cover_watchmen.jpg',
                'hero_image_path'  => 'watchmen.webp',
                'price'            => 450.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => '1984',
                'resume'           => "'1984' by George Orwell is a dystopian masterpiece that has left a deep imprint on literature and social thought...",
                'full_description' => "In '1984', George Orwell transports us to a totalitarian and oppressive world where freedom and individuality are threatened. Through the story of Winston Smith, Orwell exposes the dangers of absolute power and language manipulation. A visionary novel that remains relevant in our times and invites us to reflect on surveillance and government control.",
                'author_id'        => 2,
                'cover_image_path' => 'cover_1984.jpg',
                'hero_image_path'  => 'hero_1984.webp',
                'price'            => 320.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'The Lord of the Rings',
                'resume'           => "'The Lord of the Rings' by J.R.R. Tolkien is a fantastic epic that has captivated generations of readers around the world...",
                'full_description' => "Immerse yourself in the world of Middle Earth with 'The Lord of the Rings', the acclaimed trilogy by J.R.R. Tolkien. Through the story of Frodo Baggins and the Fellowship of the Ring, Tolkien transports us to a universe full of magic, danger, and heroism. With its detailed language and vast mythology, this epic work remains a milestone in fantasy literature and a source of inspiration for countless readers.",
                'author_id'        => 3,
                'cover_image_path' => 'cover_lotr.jpg',
                'hero_image_path'  => 'hero_lotr.jpg',
                'price'            => 550.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Pride and Prejudice',
                'resume'           => "'Pride and Prejudice' by Jane Austen is a classic novel that portrays 19th century society and social conventions...",
                'full_description' => "In 'Pride and Prejudice', Jane Austen immerses us in Regency England society and introduces us to Elizabeth Bennet and Mr. Darcy, two characters with opposite personalities who clash and are involved in misunderstandings and prejudices. Through her witty narrative, Austen examines themes such as love, social class, and the role of women in society. This captivating love story and personal overcoming has endured over time and has become a classic of literature.",
                'author_id'        => 4,
                'cover_image_path' => 'cover_pride_prejudice.jpg',
                'hero_image_path'  => 'hero_pride_prejudice.webp',
                'price'            => 280.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'One Hundred Years of Solitude',
                'resume'           => "'One Hundred Years of Solitude' by Gabriel García Márquez is a masterpiece of magical realism that narrates the story of the Buendía family...",
                'full_description' => "Dive into the magical and enigmatic world of Macondo with 'One Hundred Years of Solitude'. Gabriel García Márquez weaves a fascinating plot spanning generations, where reality and the fantastic intertwine. Through the Buendía, García Márquez explores themes such as love, solitude, war, and destiny. This novel has left an indelible mark on Latin American literature and is an undisputed classic.",
                'author_id'        => 5,
                'cover_image_path' => 'cover_cien_anos_soledad.jpg',
                'hero_image_path'  => 'hero_cien_anos_soledad.jpg',
                'price'            => 420.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'To Kill a Mockingbird',
                'resume'           => "'To Kill a Mockingbird' by Harper Lee is a moving novel that addresses issues of racial injustice and the loss of innocence...",
                'full_description' => "In 'To Kill a Mockingbird', Harper Lee presents the story of Scout, a girl growing up in the segregated South of the United States. Through Scout's eyes, the novel examines issues of race, justice, and morality. With emotional prose and unforgettable characters, Lee invites us to reflect on prejudice and the struggle for equality. This masterpiece has left a deep imprint on literature and remains relevant today.",
                'author_id'        => 6,
                'cover_image_path' => 'cover_matar_ruiseñor.jpg',
                'hero_image_path'  => 'hero_matar_ruisenor.jpg',
                'price'            => 320.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'Don Quixote of La Mancha',
                'resume'           => "'Don Quixote of La Mancha' by Miguel de Cervantes is a masterpiece of Spanish literature that narrates the adventures of a gentleman who believes himself to be a knight errant...",
                'full_description' => "Embark on the absurd and heroic adventures of Don Quixote and Sancho Panza with the crowning work of Miguel de Cervantes. This novel is an ingenious satire that questions the idea of reality and madness. Through the character of Don Quixote, Cervantes shows us the importance of ideals, the power of imagination, and the clash between fantasy and reality. With a unique style and full of humor, Cervantes gives us a vivid portrait of society and the human condition. 'Don Quixote of La Mancha' is a timeless classic that has left an indelible mark on universal literature.",
                'author_id'        => 7,
                'cover_image_path' => 'cover_quijote.jpg',
                'hero_image_path'  => 'hero_quijote.jpg',
                'price'            => 400.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Crime and Punishment',
                'resume'           => "'Crime and Punishment' by Fyodor Dostoevsky is a psychological novel that explores guilt and redemption through the story of a student who commits a crime...",
                'full_description' => "Delve into the tormented mind of Raskolnikov with 'Crime and Punishment'. Fyodor Dostoevsky immerses us in a deep psychological analysis as we follow the steps of an impoverished student who commits a murder. Through this masterpiece, Dostoevsky examines philosophical and moral issues, exploring the internal conflict between guilt and justification. With its intense prose and emotional complexity, 'Crime and Punishment' is a fundamental work in Russian and world literature.",
                'author_id'        => 8,
                'cover_image_path' => 'cover_crimen_castigo.jpg',
                'hero_image_path'  => 'hero_crimen_castigo.webp',
                'price'            => 380.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'The Great Gatsby',
                'resume'           => "'The Great Gatsby' by F. Scott Fitzgerald is an emblematic novel of the 1920s that portrays decadence and broken dreams in the jazz age...",
                'full_description' => "Immerse yourself in the vibrant and dazzling jazz age of the 1920s with 'The Great Gatsby'. F. Scott Fitzgerald transports us to a world of excess, glamour, and ambition through the story of Jay Gatsby and his obsession to recover a lost love. With his evocative prose and critical portrayal of the society of the time, Fitzgerald invites us to reflect on the illusion of the American dream and the costs of the unbridled pursuit of wealth and happiness.",
                'author_id'        => 9,
                'cover_image_path' => 'cover_gran_gatsby.jpg',
                'hero_image_path'  => 'hero_gatsby.jpg',
                'price'            => 310.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'IT',
                'resume'           => "'IT' by Stephen King is a chilling and thrilling tale that has terrified readers around the world. Set in the town of Derry...",
                'full_description' => "Step into the terrifying world of 'IT' by Stephen King, where evil takes the form of a clown named Pennywise. Set in the town of Derry, this novel follows a group of children who face their worst nightmares as they fight against this ancient evil entity. King immerses us in a story of friendship, bravery, and childhood traumas, exploring deep and dark themes. 'IT' is a classic of horror that will keep you on edge until the last page.",
                'author_id'        => 11,
                'cover_image_path' => 'cover_it.jpg',
                'hero_image_path'  => 'hero_it.jpg',
                'price'            => 410.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'V for Vendetta',
                'resume'           => "'V for Vendetta' by Alan Moore is a dystopian work that follows the story of a mysterious revolutionary known as V...",
                'full_description' => "In 'V for Vendetta', Alan Moore takes us to a dystopian future where a masked man known as V fights against a totalitarian government. This graphic novel is a tale of rebellion, anarchy, and revenge, that challenges established norms and raises questions about freedom and oppression. With its visually striking style, 'V for Vendetta' is a work that is not easily forgotten.",
                'author_id'        => 1,
                'cover_image_path' => 'cover_vendetta.jpg',
                'hero_image_path'  => 'hero_vendetta.jpg',
                'price'            => 370.0,
                'is_featured'      => 0,
            ],
            [
                'title'            => 'Animal Farm',
                'resume'           => "'Animal Farm' by George Orwell is an allegorical fable that narrates the revolt of the animals of Manor Farm against the oppression of humans...",
                'full_description' => "Immerse yourself in the political allegory of 'Animal Farm', where the animals of Manor Farm rebel against the oppression of humans and establish their own society. George Orwell uses this fable to explore themes of power, corruption, and the betrayal of revolutionary promises. Through the characters of the animals, the novel sheds light on the dangers of totalitarianism and power abuse.",
                'author_id'        => 2,
                'cover_image_path' => 'cover_rebelion_granja.jpg',
                'hero_image_path'  => 'hero_rebelion.jpg',
                'price'            => 290.0,
                'is_featured'      => 1,
            ],
            [
                'title'            => 'Love in the Time of Cholera',
                'resume'           => "'Love in the Time of Cholera' by Gabriel García Márquez is a novel that narrates an epic love story that endures over decades...",
                'full_description' => "Embark on an epic love story that spans decades with 'Love in the Time of Cholera'. Gabriel García Márquez weaves a narrative of passion and perseverance as the protagonists, Florentino Ariza and Fermina Daza, face challenges, distances, and the test of time. This novel is a tribute to the power of enduring love and the ability to wait a lifetime for the beloved.",
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
