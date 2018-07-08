<?php

	//$conn = mysqli_connect("localhost","id6411411_ibookie","");

/*	$createdatabase = "CREATE DATABASE IF NOT EXISTS `bookrecommender`";
	$res = mysqli_query($conn,$createdatabase);
	if(!$res)
	{
		echo "db was not created<br/>";
	}*/


	$conn = mysqli_connect("localhost","id6411411_ibookie","iBookie@123","id6411411_ibookie");
	$tables = array(

		'category' => 'CREATE TABLE IF NOT EXISTS `category` (
			cat_id INT PRIMARY KEY AUTO_INCREMENT,
			cat_name VARCHAR(50)
		)',

		'users' => 'CREATE TABLE IF NOT EXISTS `users` (
			user_id INT PRIMARY KEY AUTO_INCREMENT,
			user_name VARCHAR(50),
			user_email VARCHAR(50),
			user_password VARCHAR(64),
			user_address VARCHAR(250)
		)',

		//Avg rating of book = avg_rating
		'ratings' => 'CREATE TABLE IF NOT EXISTS `ratings` (
			rating_id INT PRIMARY KEY AUTO_INCREMENT,
			avg_rating FLOAT,
			number_of_users INT
		)',

		'books' => 'CREATE TABLE IF NOT EXISTS `books` (
			book_id INT PRIMARY KEY AUTO_INCREMENT,
			book_name VARCHAR(150),
			author_name VARCHAR(150),
			publish_year VARCHAR(30),
			book_language VARCHAR(20),
			image_url VARCHAR(50),
			book_description VARCHAR(5000),
			cat_id INT,
			rating_id INT,
			FOREIGN KEY (cat_id) REFERENCES category (cat_id),
			FOREIGN KEY (rating_id) REFERENCES ratings (rating_id)
		)',

		'booksOnSale' => 'CREATE TABLE IF NOT EXISTS `books_on_sale`(
			booksonsale_id INT PRIMARY KEY AUTO_INCREMENT,
			book_id INT,
			user_id INT,
			price FLOAT,
			stock INT,
			date_t DATE,
			FOREIGN KEY (book_id) REFERENCES books (book_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)
		)',

		'soldBooks' => 'CREATE TABLE IF NOT EXISTS `sold_books`(
			sold_book_id INT PRIMARY KEY AUTO_INCREMENT,
			book_id INT,
			buyer_user_id INT,
			seller_user_id INT,
			date_t DATE,
			price FLOAT,
			FOREIGN KEY (book_id) REFERENCES books (book_id),
			FOREIGN KEY (buyer_user_id) REFERENCES users (user_id),
			FOREIGN KEY (seller_user_id) REFERENCES users (user_id)
		)',

		'cart' => 'CREATE TABLE IF NOT EXISTS `cart` (
			cart_item_id INT PRIMARY KEY AUTO_INCREMENT,
			book_id INT,
			user_id INT,
			FOREIGN KEY (book_id) REFERENCES books (book_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)
		)',

		'wishlist' => 'CREATE TABLE IF NOT EXISTS `wishlist` (
			wishlist_item_id INT PRIMARY KEY AUTO_INCREMENT,
			book_id INT,
			user_id INT,
			FOREIGN KEY (book_id) REFERENCES books (book_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)	
		)',	

		'groups' => 'CREATE TABLE IF NOT EXISTS `groups` (
			group_id INT PRIMARY KEY AUTO_INCREMENT,
			cat_id INT,
			FOREIGN KEY (cat_id) REFERENCES category (cat_id)
		)',

		'group_members' => 'CREATE TABLE IF NOT EXISTS `group_members` (
			group_mem_id INT PRIMARY KEY AUTO_INCREMENT,
			group_id INT,
			user_id INT,
			FOREIGN KEY (group_id) REFERENCES groups (group_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)
		)',
		'books_read' => 'CREATE TABLE IF NOT EXISTS `books_read` (
			br_id INT PRIMARY KEY AUTO_INCREMENT,
			user_id INT,
			book_id INT,
			FOREIGN KEY (book_id) REFERENCES books (book_id)
		)'
	);


	//creating tables
	foreach($tables as $table_name => $query)
	{
		$result = mysqli_query($conn,$query);
		if(!$result)
		{
			echo $table_name . " was not created With error: " . mysqli_error($conn) . "<br/>";
		}
		else{
			echo true . "<br/>";
		}
	}





	/*DEMO DATA INSERTION*/
	$demoData = array(
		
		'category' => 'INSERT INTO category(cat_id,cat_name) VALUES
			(1,"fantasy"),
			(2,"sci-fi"),
			(3,"fiction"),
			(4,"non-fiction"),
			(5,"mystery"),
			(6,"humor"),
			(7,"horror"),
			(8,"romance"),
			(9,"crime and thriller"),
			(10,"children and young adult"),
			(11,"historical fiction"),
			(12,"mythology"),
			(13,"suspense"),
			(14,"Education");',


		'users' => 'INSERT INTO users(user_name) VALUES
		 	("harsh"),
		 	("rohit"),
		 	("raj"),
		 	("param");',


		'ratings' => 'INSERT INTO ratings(rating_id) VALUES
			(1),
			(2),
			(3),
			(4),
			(5),
			(6),
			(7),
			(8),
			(9),
			(10),
			(11),
			(12),
			(13),
			(14),
			(15),
			(16),
			(17),
			(18),
			(19),
			(20),
			(21),
			(22),
			(23),
			(24),
			(25),
			(26),
			(27),
			(28),
			(29),
			(30),
			(31),
			(32),
			(33),
			(34),
			(35),
			(36),
			(37),
			(38),
			(39),
			(40),
			(41),
			(42),
			(43),
			(44),
			(45),
			(46),
			(47),
			(48),
			(49),
			(50),
			(51),
			(52),
			(53),
			(54),
			(55),
			(56),
			(57),
			(58),
			(59),
			(60);',

		'books' => 'INSERT INTO books(book_id,book_name,author_name,publish_year,book_language,image_url,book_description,cat_id,rating_id) VALUES
			(1,"The Lord of The Rings","J. R. R. Tolkien","29 July 1954","eng","https://goo.gl/Kq15Js",
			"Three Rings for the Elven-kings under the sky, Seven for the Dwarf-lords in their halls of stone Nine for Mortal Men doomed to die, One for the Dark Lord on his dark throne In the Land of Mordor where the Shadows lie. One Ring to rule them all, One Ring to find them, One Ring to find them, One Ring to bring them all and in the darkness bind them In the Land of Mordor where the Shadows lie.\' In ancient times the Rings of Power were crafted by the Eleven-smiths, and Sauron, the Dark Lord, forged the One Ring, filling it with his own power so that he could rule all others. But the One Ring was taken from him, and though he sought it throughout Middle-earth still it remained lost to him. After many ages it fell, by chance, into the hands of the hobbit, Bilbo Baggins. From his fastness in the Dark Tower of Mordor, Sauron\'s power spread far and wide. He gathered all the Great Rings to him, but ever he searched for the One Ring that would complete his dominion. On his eleventy-first birthday, Bilbo disappeared, bequeathing to his young cousin, Frodo, the Ruling Ring, and a perilous quest: to journey across Middle-earth, deep into the shadow of the Dark Lord and destroy the Ring by casting it into the Cracks of Doom. The lord of the rings tells of the great quest undertaken by Frodo and the Fellowship of the Ring: Gandalf the wizard, Merry, pippin and Sam, Gimli the Dwarf, Legolas the Elf, Boromir of Gondor, and a tall, mysterious stranger called Strider."
			,1,1),

			(2,"The Hobbit","J. R. R. Tolkien","21 September 1937","eng","https://goo.gl/mBY6f7",
			"A great modern classic and the prelude to The Lord of the Rings.
 
Bilbo Baggins is a hobbit who enjoys a comfortable, unambitious life, rarely traveling any farther than his pantry or cellar. But his contentment is disturbed when the wizard Gandalf and a company of dwarves arrive on his doorstep one day to whisk him away on an adventure. They have launched a plot to raid the treasure hoard guarded by Smaug the Magnificent, a large and very dangerous dragon. Bilbo reluctantly joins their quest, unaware that on his journey to the Lonely Mountain he will encounter both a magic ring and a frightening creature known as Gollum.

“A glorious account of a magnificent adventure, filled with suspense and seasoned with a quiet humor that is irresistible . . . All those, young or old, who love a fine adventurous tale, beautifully told, will take The Hobbit to their hearts.” – New York Times Book Review"
			,1,2),

			(3,"Harry Potter and the Philosopher\'s Stone","J.K. Rowling","1997","eng","https://goo.gl/DzVTfL",
			"Harry Potter and the Philosopher’s Stone is the first novel of the much appreciated Harry Potter series. An abridged version of the same novel, this book has been brought out by Bloomsbury Press for children aged between eight and twelve years.

The story unfolds with a letter arriving for Harry Potter, a simple boy, that brings with it a dark secret. The letter reveals to Harry Potter that both his parents were wizards and were killed by a Dark Lord’s curse when he was just a baby.

Thereafter Potter\'s journey to the Hogwarts, a school of wizards brimming with magic, mystery and enchantment, spins out into a fascinating tale. After his journey to Hogwarts, young Harry learns of a missing stone — a stone which can be both terrifying and valuable at the same time, depending on who possesses it and how one uses it. Will Harry Potter and his friends be able to get hold of the stone is how the story unfolds from here on?

It is here Harry Potter’s long journey spread over 7 books really begins. In simple words and rich prose, this children’s edition rightly captures the essence of the Harry Potter’s first novel and promises to take the children on an enchanting ride to the magical world order."
			,1,3),

			(4,"Harry Potter and the Chamber of Secrets","J.K. Rowling","2 July 1998","eng","https://goo.gl/3RB28m",
			"\'There is a plot, Harry Potter. A plot to make the most terrible things happen at Hogwarts School of Witchcraft and Wizardry this year.\'
     Harry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors -- and then the attacks start. Students are found as though turned to stone... Dobby\'s sinister predictions seem to be coming true. 
     This gift edition hardback, presented in a beautiful foiled slipcase decorated with brand new line art by Jonny Duddle, will delight readers as they follow Harry and his friends through their second year at Hogwarts School of Witchcraft and Wizardry."
			,1,4),

			(5,"Harry Potter and the Prisoner of Azkaban","J.K. Rowling","8 July 1999","eng","https://goo.gl/HwWTcY",
			"From the pen of one of the most renowned authors of the world, J. K. Rowling, comes the third instalment in the Harry Potter series, \'Harry Potter and the Prisoner of Azkaban’. After the life changing and near death experiences from the first two novels, the protagonist of the novel, Harry with his friends Ron and Hermione, enter their third year in the Hogwarts School of Witchcraft and Wizardry. New adventures await them in their third year and everything changes when a mass-murderer going by the name of Sirius Black escapes the wizard prison of Azkaban and he is looking for Harry. With all the aspects of the previous novels that were widely loved by audiences worldwide, the third book in the series adds its own charm to the story and carries it forward. The novel has a thrilling narrative with edge of the seat action. One of the bestselling novels in the world, the Harry Potter series has sold over 450 million copies worldwide and translated into over 80 languages. The Harry Potter series has also been adapted in to a Hollywood series comprising of 8 movies that have been an immense critical and commercial success. This book is a new edition of the popular young adult series and comes with a rEvamped cover that relates to the story and comes equipped with various goodies inside."
			,1,5),

			(6,"Harry Potter and the Goblet of Fire","J.K. Rowling","8 July 2000","eng","https://goo.gl/9am5bK",
			"\'There will be three tasks, spaced throughout the school year, and they will test the champions in many different ways ... their magical prowess - their daring - their powers of deduction - and, of course, their ability to cope with danger.\'

The Triwizard Tournament is to be held at Hogwarts. Only wizards who are over seventeen are allowed to enter - but that doesn\'t stop Harry dreaming that he will win the competition. Then at Hallowe\'en, when the Goblet of Fire makes its selection, Harry is amazed to find his name is one of those that the magical cup picks out. He will face death-defying tasks, dragons and Dark wizards, but with the help of his best friends, Ron and Hermione, he might just make it through - alive!

This gift edition hardback, presented in a beautiful foiled slipcase decorated with brand new line art by Jonny Duddle, will delight readers as they cheer Harry on through his fourth year at Hogwarts School of Witchcraft and Wizardry."
			,1,6),

			(7,"A Game of Thrones (A Song of Ice and Fire)","George R.R. Martin","1 August 1996","eng","https://goo.gl/VjxY7Y",
			"Full of drama and adventure, rage and lust, mystery and romance, George R.R. Martin’s \'Game of Thrones: Song of Fire and Ice’ (Book I) is regarded as one of the most intriguing and greatest epic of the modern era. Set in 12, 000BC, the seasons in this epic change after decades and bring with them mystery and death. The epic opens with the winter season fast approaching; though the human are protected and safe within the protective ice Wall of the kingdom, winter has arose the deadly forces that are continuously threatening the identity of the mortal power.

In the first book replete with lust, rage, anger, betrayal and terror, two families take the central position: the Lannisters and the Starks. Will the good prevail over the worse? Or, is the scenario going to be much worse than ever? And, who is this new character Daenerys Targaryen? The adventurous tale of magic, power and supernatural forces promise to sway the readers off their feet till the end.

Published in 1996, the novel has received much critical acclaims, including the Ignotus Award, the Hugo Award and the Locus Award. It was also adapted into a famous TV-series by HBO."
			,1,7),


			(8,"Stormbreaker (Alex Rider)","Anthony Horowitz","4 September 2000","eng","https://goo.gl/RPuUmw",
			"They told him his uncle died in an accident. He wasn\'t wearing his seatbelt, they said. But when fourteen-year-old Alex finds his uncle\'s windshield riddled with bullet holes, he knows it was no accident. What he doesn\'t know yet is that his uncle was killed while on a top-secret mission. But he is about to, and once he does, there is no turning back. Finding himself in the middle of terrorists, Alex must outsmart the people who want him dead. The government has given him the technology, but only he can provide the courage. Should he fail, every child in England will be murdered in cold blood."
			,2,8),

			(9,"Point Blanc (Alex Rider)","Anthony Horowitz","3 September 2001","eng","https://goo.gl/bb4UUn",
			"Investigations into the \'accidental\' deaths of two of the world\'s most powerful men have revealed just one link: both had a son attending Point Blanc Academy - an exclusive school for rebellious rich kids, run by the sinister Dr Grief and set high on an isolated mountain peak in the French Alps. Armed only with a false ID and a new collection of brilliantly disguised gadgets, Alex must infiltrate the academy as a pupil and establish the truth about what is really happening there."
			,2,9),

			(10,"Skeleton Key (Alex Rider)","Anthony Horowitz","8 July 2002","eng","https://goo.gl/2xvTCC",
			"Alex Rider has been through a lot for his fourteen years. He\'s been shot at by international terrorists, chased down a mountainside on a makeshift snowboard, and has stood face-to-face with pure evil. Twice, young Alex has managed to save the world. And twice, he has almost been killed doing it. But now Alex faces something even more dangerous. The desperation of a man who has lost everything he cared for: his country and his only son. A man who just happens to have a nuclear weapon and a serious grudge against the free world. To see his beloved Russia once again be a dominant power, he will stop at nothing. Unless Alex can stop him first... Uniting forces with America\'s own CIA for the first time, teen spy Alex Rider battles terror from the sun-baked beaches of Miami all the way to the barren ice fields of northernmost Russia. Come along for the thrilling ride of a lifetime."
			,2,10),

			(11,"Eagle Strike (Alex Rider)","Anthony Horowitz","4 September 2003","eng","https://goo.gl/sosQ8B",
			"Reluctant MI6 agent Alex Rider is relaxing in the south of France until a sudden, ruthless attack on his hosts plunges him back into a world of violence and mystery - and this time, MI6 don\'t want to know. Alex is determined to track down his friends\' attackers, even if he must do it alone. But it\'s a path that leads to a long-buried secret - and a discovery more terrible than anything he could have imagined."
			,2,11),

			(12,"Red Rising","Pierce Brown","28 January 2014","eng","https://goo.gl/mxxowD",
			"\'I live for the dream that my children will be born free,\' she says. \'That they will be what they like. That they will own the land their father gave them.\'

\'I live for you,\' I say sadly.

Eo kisses my cheek. \'Then you must live for more.\'

Darrow is a Red, a member of the lowest caste in the color-coded society of the future. Like his fellow Reds, he works all day, believing that he and his people are making the surface of Mars livable for future generations.

Yet he spends his life willingly, knowing that his blood and sweat will one day result in a better world for his children.

But Darrow and his kind have been betrayed. Soon he discovers that humanity already reached the surface generations ago. Vast cities and sprawling parks spread across the planet. Darrow—and Reds like him—are nothing more than slaves to a decadent ruling class.

Inspired by a longing for justice, and driven by the memory of lost love, Darrow sacrifices everything to infiltrate the legendary Institute, a proving ground for the dominant Gold caste, where the next generation of humanity\'s overlords struggle for power. He will be forced to compete for his life and the very future of civilization against the best and most brutal of Society\'s ruling class. There, he will stop at nothing to bring down his enemies... even if it means he has to become one of them to do so."
			,2,12),

			(13,"Ready Player One","Ernest Cline","16 August 2011","eng","https://goo.gl/fEpW9t",
			"In the year 2044, reality is an ugly place. The only time teenage Wade Watts really feels alive is when he\'s jacked into the virtual utopia known as the  OASIS. Wade\'s devoted his life to studying the puzzles hidden within this world\'s digital confines, puzzles that are based on their creator\'s obsession with the pop culture of decades past and that promise massive power and fortune to whoever can unlock them. When Wade stumbles upon the first clue, he finds himself beset by players willing to kill to take this ultimate prize. The race is on, and if Wade\'s going to survive, he\'ll have to win—and confront the real world he\'s always been so desperate to escape."
			,2,13),

			(14,"The Martian","Andy Weir","2011","eng","https://goo.gl/XLeFjN",
			"Now, he’s sure he’ll be the first person to die there.

After a dust storm nearly kills him and forces his crew to evacuate while thinking him dead, Mark finds himself stranded and completely alone with no way to even signal Earth that he’s alive—and even if he could get word out, his supplies would be gone long before a rescue could arrive. 

Chances are, though, he won’t have time to starve to death. The damaged machinery, unforgiving environment, or plain-old “human error” are much more likely to kill him first. 

But Mark isn’t ready to give up yet. Drawing on his ingenuity, his engineering skills — and a relentless, dogged refusal to quit — he steadfastly confronts one seemingly insurmountable obstacle after the next. Will his resourcefulness be enough to overcome the impossible odds against him?"
			,2,14),


			(15,"A Study in Scarlet (Sherlock Holmes #1)","Arthur Conan Doyle","November 1887","eng","https://goo.gl/W41sYp",
			"From the moment Dr John Watson takes lodgings in Baker Street with the consulting detective Sherlock Holmes, he becomes intimately acquainted with the bloody violence and frightening ingenuity of the criminal mind.

In A Study in Scarlet , Holmes and Watson\'s first mystery, the pair are summoned to a south London house where they find a dead man whose contorted face is a twisted mask of horror. The body is unmarked by violence but on the wall a mysterious word has been written in blood.

The police are baffled by the crime and its circumstances. But when Sherlock Holmes applies his brilliantly logical mind to the problem he uncovers a tragic tale of love and deadly revenge . . ."
			,3,15),

			(16,"The Sign of Four (Sherlock Holmes #2)","Arthur Conan Doyle","February 1890","eng","https://goo.gl/dvqoWs",
			"\'You are a wronged woman and shall have justice. Do not bring police. If you do, all will be in vain. Your unknown friend.\'

When a beautiful young woman is sent a letter inviting her to a sinister assignation, she immediately seeks the advice of the consulting detective Sherlock Holmes.

For this is not the first mysterious item Mary Marston has received in the post. Every year for the last six years an anonymous benefactor has sent her a large lustrous pearl. Now it appears the sender of the pearls would like to meet her to right a wrong.

But when Sherlock Holmes and his faithful sidekick Watson, aiding Miss Marston, attend the assignation, they embark on a dark and mysterious adventure involving a one-legged ruffian, some hidden treasure, deadly poison darts and a thrilling race along the River Thames."
			,3,16),

			(17,"The Adventures of Sherlock Holmes (Sherlock Holmes #3)","Arthur Conan Doyle","14 October 1892","eng","https://goo.gl/Qj4Bu9",
			"Sherlock Holmes, scourge of criminals everywhere, whether they be lurking in London\'s foggy backstreets or plotting behind the walls of an idyllic country mansion, and his faithful colleague Dr Watson solve twelve breathtaking and perplexing mysteries.

In The Adventures of Sherlock Holmes, the first collection of the great consulting detective\'s cases, we encounter some of his most famous and devilishly difficult problems, including A Scandal in Bohemia, The Speckled Band, The Red-Headed League, The Blue Carbuncle, The Five Orange Pips and The Man with the Twisted Lip."
			,3,17),

			(18,"The Hound of the Baskervilles (Sherlock Holmes #5)","Arthur Conan Doyle","April 1902","eng","https://goo.gl/wpQwdq",
			"The death, quite suddenly, of Sir Charles Baskerville in mysterious circumstances is the trigger for one of the most extraordinary cases ever to challenge the brilliant analytical mind of Sherlock Holmes. As rumours of a legendary hound said to haunt the Baskerville family circulate, Holmes and Watson are asked to ensure the protection of Sir Charles\' only heir, Sir Henry - who has travelled all the way from America to reside at Baskerville Hall in Devon. And it is there, in an isolated mansion surrounded by mile after mile of wild moor, that Holmes and Watson come face to face with a terrifying evil that reaches out from centuries past . . ."
			,3,18),			

			(19,"To Kill a Mockingbird","Harper Lee","11 July 1960","eng","https://goo.gl/2zxVgE",
			"The unforgettable novel of a childhood in a sleepy Southern town and the crisis of conscience that rocked it, To Kill A Mockingbird became both an instant bestseller and a critical success when it was first published in 1960. It went on to win the Pulitzer Prize in 1961 and was later made into an Academy Award-winning film, also a classic.

Compassionate, dramatic, and deeply moving, To Kill A Mockingbird takes readers to the roots of human behavior - to innocence and experience, kindness and cruelty, love and hatred, humor and pathos. Now with over 18 million copies in print and translated into forty languages, this regional story by a young Alabama woman claims universal appeal. Harper Lee always considered her book to be a simple love story. Today it is regarded as a masterpiece of American literature."
			,3,19),


			(20,"The Diary of a Young Girl","Anne Frank","25 June 1947","eng","https://goo.gl/rPuqfW",
			"Anne Frank\'s extraordinary diary, written in the Amsterdam attic where she and her family hid from the Nazis for two years, has become a world classic and a timeless testament to the human spirit. Now, in a new edition enriched by many passages originally withheld by her father, we meet an Anne more real, more human, and more vital than ever. Here she is first and foremost a teenage girl—stubbornly honest, touchingly vulnerable, in love with life. She imparts her deeply secret world of soul-searching and hungering for affection, rebellious clashes with her mother, romance and newly discovered sexuality, and wry, candid observations of her companions. Facing hunger, fear of discovery and death, and the petty frustrations of such confined quarters, Anne writes with adult wisdom and views beyond her years. Her story is that of every teenager, lived out in conditions few teenagers have ever known."
			,4,20),

			(21,"In Cold Blood","Truman Capote","January 1966","eng","https://goo.gl/snnqrP",
			"On November 15, 1959, in the small town of Holcomb, Kansas, four members of the Clutter family were savagely murdered by blasts from a shotgun held a few inches from their faces. There was no apparent motive for the crime, and there were almost no clues. 

As Truman Capote reconstructs the murder and the investigation that led to the capture, trial, and execution of the killers, he generates both mesmerizing suspense and astonishing empathy. In Cold Blood is a work that transcends its moment, yielding poignant insights into the nature of American violence."
			,4,21),
			
			(22,"The Immortal Life of Henrietta Lacks","Rebecca Skloot","2 February 2010","eng","https://goo.gl/zP3ZA1",
			"Her name was Henrietta Lacks, but scientists know her as HeLa. She was a poor Southern tobacco farmer who worked the same land as her slave ancestors, yet her cells—taken without her knowledge—became one of the most important tools in medicine. The first “immortal” human cells grown in culture, they are still alive today, though she has been dead for more than sixty years. If you could pile all HeLa cells ever grown onto a scale, they’d weigh more than 50 million metric tons—as much as a hundred Empire State Buildings. HeLa cells were vital for developing the polio vaccine; uncovered secrets of cancer, viruses, and the atom bomb’s effects; helped lead to important advances like in vitro fertilization, cloning, and gene mapping; and have been bought and sold by the billions.
Yet Henrietta Lacks remains virtually unknown, buried in an unmarked grave.

Now Rebecca Skloot takes us on an extraordinary journey, from the “colored” ward of Johns Hopkins Hospital in the 1950s to stark white laboratories with freezers full of HeLa cells; from Henrietta’s small, dying hometown of Clover, Virginia — a land of wooden slave quarters, faith healings, and voodoo — to East Baltimore today, where her children and grandchildren live and struggle with the legacy of her cells.

Henrietta’s family did not learn of her “immortality” until more than twenty years after her death, when scientists investigating HeLa began using her husband and children in research without informed consent. And though the cells had launched a multimillion-dollar industry that sells human biological materials, her family never saw any of the profits. As Rebecca Skloot so brilliantly shows, the story of the Lacks family — past and present — is inextricably connected to the dark history of experimentation on African Americans, the birth of bioethics, and the legal battles over whether we control the stuff we are made of.

Over the decade it took to uncover this story, Rebecca became enmeshed in the lives of the Lacks family—especially Henrietta’s daughter Deborah, who was devastated to learn about her mother’s cells. She was consumed with questions: Had scientists cloned her mother? Did it hurt her when researchers infected her cells with viruses and shot them into space? What happened to her sister, Elsie, who died in a mental institution at the age of fifteen? And if her mother was so important to medicine, why couldn’t her children afford health insurance?

Intimate in feeling, astonishing in scope, and impossible to put down, The Immortal Life of Henrietta Lacks captures the beauty and drama of scientific discovery, as well as its human consequences."
			,4,22),

			(23,"Sapiens: A Brief History of Humankind","Yuval Noah Harari","2011", "eng" , "https://goo.gl/NqrJyU",
			"How did our species succeed in the battle for dominance? Why did our foraging ancestors come together to create cities and kingdoms? How did we come to believe in gods, nations and human rights; to trust money, books and laws; and to be enslaved by bureaucracy, timetables and consumerism? And what will our world be like in the millennia to come? 

In Sapiens, Dr Yuval Noah Harari spans the whole of human history, from the very first humans to walk the earth to the radical – and sometimes devastating – breakthroughs of the Cognitive, Agricultural and Scientific Revolutions. Drawing on insights from biology, anthropology, paleontology and economics, he explores how the currents of history have shaped our human societies, the animals and plants around us, and even our personalities. Have we become happier as history has unfolded? Can we ever free our behaviour from the heritage of our ancestors? And what, if anything, can we do to influence the course of the centuries to come? 

Bold, wide-ranging and provocative, Sapiens challenges everything we thought we knew about being human: our thoughts, our actions, our power ... and our future."
			,4,23),

			(24,"A Room of One\'s Own","Virginia Woolf","24 October 1929","eng","https://goo.gl/HmSBCc",
			"A Room of One\'s Own is considered Virginia Woolf\'s most powerful feminist essay, justifying the need for women to possess intellectual freedom and financial independence. Based on a lecture given at Girton College, Cambridge, the essay is one of the great feminist polemics, ranging in its themes from Jane Austen and Charlotte Bronte to the silent fate of Shakespeare\'s gifted (imaginary) sister and the effects of poverty and sexual constraint on female creativity.

Virginia Woolf (1882-1941) is regarded as a major twentieth-century author and essayist, a key figure in literary history as a feminist and a modernist, and the centre of \'The Bloomsbury Group\'."
			,4,24),

			(25,"Gone Girl","Gillian Flynn","24 May 2012","eng","https://goo.gl/oMDUcV",
			"On a warm summer morning in North Carthage, Missouri, it is Nick and Amy Dunne’s fifth wedding anniversary. Presents are being wrapped and reservations are being made when Nick’s clever and beautiful wife disappears. Husband-of-the-Year Nick isn’t doing himself any favors with cringe-worthy daydreams about the slope and shape of his wife’s head, but passages from Amy\'s diary reveal the alpha-girl perfectionist could have put anyone dangerously on edge. Under mounting pressure from the police and the media—as well as Amy’s fiercely doting parents—the town golden boy parades an endless series of lies, deceits, and inappropriate behavior. Nick is oddly evasive, and he’s definitely bitter—but is he really a killer?"
			,5,25),

			(26,"Murder on the Orient Express","Agatha Christie", "1 January 1934","eng","https://goo.gl/tuyBAV",
			"What more can a mystery addict desire than a much-loathed murder victim found aboard the luxurious Orient Express with multiple stab wounds, thirteen likely suspects, an incomparably brilliant detective in Hercule Poirot, and the most ingenious crime ever conceived?"
			,5,26),

			(27,"The Magpie Murders","Anthony Horowitz","6 October 2016","eng","https://goo.gl/uM5jp3",
			"When editor Susan Ryeland is given the manuscript of Alan Conway’s latest novel, she has no reason to think it will be much different from any of his others. After working with the bestselling crime writer for years, she’s intimately familiar with his detective, Atticus Pünd, who solves mysteries disturbing sleepy English villages. An homage to queens of classic British crime such as Agatha Christie and Dorothy Sayers, Alan’s traditional formula has proved hugely successful. So successful that Susan must continue to put up with his troubling behavior if she wants to keep her job.

Conway’s latest tale has Atticus Pünd investigating a murder at Pye Hall, a local manor house. Yes, there are dead bodies and a host of intriguing suspects, but the more Susan reads, the more she’s convinced that there is another story hidden in the pages of the manuscript: one of real-life jealousy, greed, ruthless ambition, and murder."
			,5,27),

			(28,"And Then There Were None","Agatha Christie","6 November 1939","eng","https://goo.gl/DQ1CNv",
			"First, there were ten—a curious assortment of strangers summoned as weekend guests to a private island off the coast of Devon. Their host, an eccentric millionaire unknown to all of them, is nowhere to be found. All that the guests have in common is a wicked past they\'re unwilling to reveal—and a secret that will seal their fate. For each has been marked for murder. One by one they fall prey. Before the weekend is out, there will be none. And only the dead are above suspicion."
			,5,28),

			(29,"The Da Vinci Code","Dan Brown","18 March 2003","eng","https://goo.gl/C5Pwt2",
			"While in Paris, Harvard symbologist Robert Langdon is awakened by a phone call in the dead of the night. The elderly curator of the Louvre has been murdered inside the museum, his body covered in baffling symbols. As Langdon and gifted French cryptologist Sophie Neveu sort through the bizarre riddles, they are stunned to discover a trail of clues hidden in the works of Leonardo da Vinci—clues visible for all to see and yet ingeniously disguised by the painter.

Even more startling, the late curator was involved in the Priory of Sion—a secret society whose members included Sir Isaac Newton, Victor Hugo, and Da Vinci—and he guarded a breathtaking historical secret. Unless Langdon and Neveu can decipher the labyrinthine puzzle—while avoiding the faceless adversary who shadows their every move—the explosive, ancient truth will be lost forever."
			,5,29),

			(30,"Angels & Demons","Dan Brown","May 2000","eng","https://goo.gl/N8pQMv",
			"An ancient secret brotherhood.
A devastating new weapon of destruction.
An unthinkable target... 

When world-renowned Harvard symbologist Robert Langdon is summoned to a Swiss research facility to analyze a mysterious symbol -- seared into the chest of a murdered physicist -- he discovers evidence of the unimaginable: the resurgence of an ancient secret brotherhood known as the Illuminati... the most powerful underground organization ever to walk the earth. The Illuminati has surfaced from the shadows to carry out the final phase of its legendary vendetta against its most hated enemy... the Catholic Church. 

Langdon\'s worst fears are confirmed on the eve of the Vatican\'s holy conclave, when a messenger of the Illuminati announces he has hidden an unstoppable time bomb at the very heart of Vatican City. With the countdown under way, Langdon jets to Rome to join forces with Vittoria Vetra, a beautiful and mysterious Italian scientist, to assist the Vatican in a desperate bid for survival. 

Embarking on a frantic hunt through sealed crypts, dangerous catacombs, deserted cathedrals, and even to the heart of the most secretive vault on earth, Langdon and Vetra follow a 400-year old trail of ancient symbols that snakes across Rome toward the long-forgotten Illuminati lair... a secret location that contains the only hope for Vatican salvation. 

An explosive international thriller, Angels & Demons careens from enlightening epiphanies to dark truths as the battle between science and religion turns to war."
			,5,30),


			(31,"The Hitchhiker\'s Guide to the Galaxy","Douglas Adams","12 October 1979","eng","https://goo.gl/UoKxT5",
			"Seconds before the Earth is demolished to make way for a galactic freeway, Arthur Dent is plucked off the planet by his friend Ford Prefect, a researcher for the revised edition of The Hitchhiker\'s Guide to the Galaxy who, for the last fifteen years, has been posing as an out-of-work actor.

Together this dynamic pair begin a journey through space aided by quotes from The Hitchhiker\'s Guide (\'A towel is about the most massively useful thing an interstellar hitchhiker can have\') and a galaxy-full of fellow travelers: Zaphod Beeblebrox—the two-headed, three-armed ex-hippie and totally out-to-lunch president of the galaxy; Trillian, Zaphod\'s girlfriend (formally Tricia McMillan), whom Arthur tried to pick up at a cocktail party once upon a time zone; Marvin, a paranoid, brilliant, and chronically depressed robot; Veet Voojagig, a former graduate student who is obsessed with the disappearance of all the ballpoint pens he bought over the years."
			,6,31),

			(32,"So Long, and Thanks for All the Fish","Douglas Adams","9 November 1984","eng","https://goo.gl/2XMrjq",
			"Back on Earth with nothing more to show for his long, strange trip through time and space than a ratty towel and a plastic shopping bag, Arthur Dent is ready to believe that the past eight years were all just a figment of his stressed-out imagination. But a gift-wrapped fishbowl with a cryptic inscription, the mysterious disappearance of Earth\'s dolphins, and the discovery of his battered copy of The Hitchhiker\'s Guide to the Galaxy all conspire to give Arthur the sneaking suspicion that something otherworldly is indeed going on. . . .

God only knows what it all means. And fortunately, He left behind a Final Message of explanation. But since it\'s light-years away from Earth, on a star surrounded by souvenir booths, finding out what it is will mean hitching a ride to the far reaches of space aboard a UFO with a giant robot. But what else is new?"
			,6,32),

			(33,"Bridget Jones\'s Diary","Helen Fielding","1996","eng","https://goo.gl/LdR3Yd",
			"\'123 lbs. (how is it possible to put on 4 pounds in the middle of the night? Could flesh have somehow solidified becoming denser and heavier? Repulsive, horrifying notion), alcohol units 4 (excellent), cigarettes 21 (poor but will give up totally tomorrow), number of correct lottery numbers 2 (better, but nevertheless useless)...\'

Bridget Jones\' Diary is the devastatingly self-aware, laugh-out-loud daily chronicle of Bridget\'s permanent, doomed quest for self-improvement — a year in which she resolves to: reduce the circumference of each thigh by 1.5 inches, visit the gym three times a week not just to buy a sandwich, form a functional relationship with a responsible adult, and learn to program the VCR.

Over the course of the year, Bridget loses a total of 72 pounds but gains a total of 74. She remains, however, optimistic. Through it all, Bridget will have you helpless with laughter, and — like millions of readers the world round — you\'ll find yourself shouting, \'Bridget Jones is me!\'"
			,6,33),

			(34,"The Code of the Woosters","P. G. Wodehouse","7 October 1938","eng","https://goo.gl/3AtBJA",
			"Take Gussie Fink-Nottle, Madeline Bassett, old Pop Bassett, the unscrupulous Stiffy Byng, the Rev., an 18th-century cow-creamer, a small brown leather covered notebook and mix with a dose of the aged aunt Dahlia and one has a dangerous brew which spells toil and trouble for Bertie and Jeeves."
			,6,34),

			(35,"Something Fresh","P.G. Wodehouse","16 September 1915","eng","https://goo.gl/HWqXeW",
			"One thing that constantly disrupts the peace of life at Blandings is the constant incursion of impostors. Blandings has impostors like other houses have mice. 

Now there are two of them – both intent on a dangerous enterprise. Lord Emsworth’s secretary, the efficient Baxter, is on the alert and determined to discover what is afoot – despite the distractions caused by the Honorable Freddie Threepwood’s hapless affair of the heart."
			,6,35),

			(36,"It","Stephen King","15 September 1986","eng","https://goo.gl/DRMqps",
			"Welcome to Derry, Maine ...

It’s a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real ...

They were seven teenagers when they first stumbled upon the horror. Now they are grown-up men and women who have gone out into the big world to gain success and happiness. But none of them can withstand the force that has drawn them back to Derry to face the nightmare without an end, and the evil without a name."
			,7,36),

			(37,"Misery","Stephen King","8 June 1987","eng","https://goo.gl/yKeEja",
			"Novelist Paul Sheldon has plans to make the difficult transition from writing historical romances featuring heroine Misery Chastain to publishing literary fiction. Annie Wilkes, Sheldon\'s number one fan, rescues the author from the scene of a car accident. The former nurse takes care of him in her remote house, but becomes irate when she discovers that the author has killed Misery off in his latest book. Annie keeps Sheldon prisoner while forcing him to write a book that brings Misery back to life."
			,7,37),

			(38,"The Shining","Stephen King","28 January 1977","eng","https://goo.gl/Df2pC9",
			"Jack Torrance\'s new job at the Overlook Hotel is the perfect chance for a fresh start. As the off-season caretaker at the atmospheric old hotel, he\'ll have plenty of time to spend reconnecting with his family and working on his writing. But as the harsh winter weather sets in, the idyllic location feels ever more remote...and more sinister. And the only one to notice the strange and terrible forces gathering around the Overlook is Danny Torrance, a uniquely gifted five-year-old."
			,7,38),

			(39,"Carrie","Stephen King","5 April 1974","eng","https://goo.gl/zzsDSi",
			"Carrie knew she should not use the terrifying power she possessed... But one night at her senior prom, Carrie was scorned and humiliated just one time too many, and in a fit of uncontrollable fury she turned her clandestine game into a weapon of horror and destruction..."
			,7,39),

			(40,"The Stand","Stephen King","September 1978","eng","https://goo.gl/jQd2pz",
			"This is the way the world ends: with a nanosecond of computer error in a Defense Department laboratory and a million casual contacts that form the links in a chain letter of death. And here is the bleak new world of the day after: a world stripped of its institutions and emptied of 99 percent of its people. A world in which a handful of panicky survivors choose sides -- or are chosen."
			,7,40),


			(41,"Fifty Shades of Grey","E. L. James","May 2011","eng","https://goo.gl/4Az6Rm",
			"When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him. Unable to resist Ana’s quiet beauty, wit, and independent spirit, Grey admits he wants her, too—but on his own terms.
 
Shocked yet thrilled by Grey’s singular erotic tastes, Ana hesitates. For all the trappings of success—his multinational businesses, his vast wealth, his loving family—Grey is a man tormented by demons and consumed by the need to control. When the couple embarks on a daring, passionately physical affair, Ana discovers Christian Grey’s secrets and explores her own dark desires.

Erotic, amusing, and deeply moving, the Fifty Shades Trilogy is a tale that will obsess you, possess you, and stay with you forever."
			,8,41),

			(42,"The Fault in Our Stars","John Green and Rodrigo Corral","10 January 2012","eng","https://goo.gl/uATF2j",
			"Despite the tumor-shrinking medical miracle that has bought her a few years, Hazel has never been anything but terminal, her final chapter inscribed upon diagnosis. But when a gorgeous plot twist named Augustus Waters suddenly appears at Cancer Kid Support Group, Hazel\'s story is about to be completely rewritten.

Insightful, bold, irreverent, and raw, The Fault in Our Stars is award-winning author John Green\'s most ambitious and heartbreaking work yet, brilliantly exploring the funny, thrilling, and tragic business of being alive and in love."
			,8,42),

			(43,"Fifty Shades Darker","E. L. James","17 April 2012","eng","https://goo.gl/2r9WwH",
			"Daunted by the singular sexual tastes and dark secrets of the beautiful, tormented young entrepreneur Christian Grey, Anastasia Steele has broken off their relationship to start a new career with a Seattle publishing house. But desire for Christian still dominates her every waking thought, and when he proposes a new arrangement, Anastasia cannot resist. They rekindle their searing sensual affair, and Anastasia learns more about the harrowing past of her damaged, driven, and demanding Fifty Shades. While Christian wrestles with his inner demons, Anastasia must confront her anger and envy of the women who came before her and make the most important decision of her life. Erotic, sparkling and suspenseful, Fifty Shades Darker is the irresistibly addictive second part of the Fifty Shades trilogy."
			,8,43),

			(44,"The Notebook","Nicholas Sparks","1 October 1996","eng","https://goo.gl/zke64S",
			"Set amid the austere beauty of the North Carolina coast, The Notebook begins with the story of Noah Calhoun, a rural Southerner recently returned form the Second World War. Noah is restoring a plantation home to its former glory, and he is haunted by images of the beautiful girl he met fourteen years earlier, a girl he loved like no other. Unable to find her, yet unwilling to forget the summer they spent together, Noah is content to live with only memories...until she unexpectedly returns to his town to see him once again.

Like a puzzle within a puzzle, the story of Noah and Allie is just the beginning. As it unfolds, their tale miraculously becomes something different, with much higher stakes. The result is a deeply moving portrait of love itself, the tender moments and the fundamental changes that affect us all. It is a story of miracles and emotions that will stay with you forever."
			,8,44),

			(45,"Naked in Death","Nora Roberts","28 July 1995","eng","https://goo.gl/YY4r99",
			"Here is the novel that started it all- the first book in J.D. Robb\'s number-one New York Times-bestselling In Death series, featuring New York homicide detective Lieutenant Eve Dallas and Roarke. 

It is the year 2058, and technology now completely rules the world. But New York City Detective Eve Dallas knows that the irresistible impulses of the human heart are still ruled by just one thing: passion. 

When a senator\'s daughter is killed, the secret life of prostitution she\'d been leading is revealed. The high-profile case takes Lieutenant Eve Dallas into the rarefied circles of Washington politics and society. Further complicating matters is Eve\'s growing attraction to Roarke, who is one of the wealthiest and most influential men on the planet, devilishly handsome... and the leading suspect in the investigation."
			,8,45),

			
			(46,"Origin","Dan brown","3 October 2017","eng","https://goo.gl/5nNfge",
			"Robert Langdon, Harvard professor of symbology and religious iconology, arrives at the ultramodern Guggenheim Museum in Bilbao to attend a major announcement—the unveiling of a discovery that “will change the face of science forever.” The evening’s host is Edmond Kirsch, a forty-year-old billionaire and futurist whose dazzling high-tech inventions and audacious predictions have made him a renowned global figure. Kirsch, who was one of Langdon’s first students at Harvard two decades earlier, is about to reveal an astonishing breakthrough . . . one that will answer two of the fundamental questions of human existence.
As the event begins, Langdon and several hundred guests find themselves captivated by an utterly original presentation, which Langdon realizes will be far more controversial than he ever imagined. But the meticulously orchestrated evening suddenly erupts into chaos, and Kirsch’s precious discovery teeters on the brink of being lost forever. Reeling and facing an imminent threat, Langdon is forced into a desperate bid to escape Bilbao. With him is Ambra Vidal, the elegant museum director who worked with Kirsch to stage the provocative event. Together they flee to Barcelona on a perilous quest to locate a cryptic password that will unlock Kirsch’s secret.

Navigating the dark corridors of hidden history and extreme religion, Langdon and Vidal must evade a tormented enemy whose all-knowing power seems to emanate from Spain’s Royal Palace itself... and who will stop at nothing to silence Edmond Kirsch. On a trail marked by modern art and enigmatic symbols, Langdon and Vidal uncover clues that ultimately bring them face-to-face with Kirsch’s shocking discovery... and the breathtaking truth that has long eluded us."
			,9,46),

			(47,"The Lost Symbol","Dan Brown","15 September 2009","eng","https://goo.gl/iTrXLp",
			"In this stunning follow-up to the global phenomenon The Da Vinci Code, Dan Brown demonstrates once again why he is the world\'s most popular thriller writer. The Lost Symbol is a masterstroke of storytelling - a deadly race through a real-world labyrinth of codes, secrets, and unseen truths...all under the watchful eye of Brown\'s most terrifying villain to date. Set within the hidden chambers, tunnels, and temples of Washington, DC., The Lost Symbol accelerates through a startling landscape toward an unthinkable finale.

As the story opens, Harvard symbologist Robert Langdon is summoned unexpectedly to deliver an evening lecture in the U.S. Capitol Building. Within minutes of his arrival, however, the night takes a bizarre turn. A disturbing object - artfully encoded with five symbols - is discovered in the Capitol Building. Langdon recognizes the object as an ancient invitation...one meant to usher its recipient into a long-lost world of esoteric wisdom.

When Langdon\'s beloved mentor, Peter Solomon - a prominent Mason and philanthropist - is brutally kidnapped, Langdon realizes his only hope of saving Peter is to accept this mystical invitation and follow wherever it leads him. Langdon is instantly into a clandestine world of Masonic secrets, hidden history, and never-before-seen locations - all of which seem to be dragging him toward a single, inconceivable truth.

As the world discovered in The Da Vinci Code and Angels & Demons, Dan Brown\'s novels are brilliant tapestries of veiled histories, arcane symbols, and enigmatic codes. In this new novel, he again challenges readers with an intelligent, lightning-paced story that offers surprises at every turn. The Lost Symbol is exactly what Brown\'s fans have been waiting for...his most thrilling novel yet."
			,9,47),

			(48,"The President is Missing","Bill Clinton and James Patterson","4 June 2018","eng","https://goo.gl/JRBabP",
			"As the novel opens, a threat looms. Enemies are planning an attack of unprecedented scale on America. Uncertainty and fear grip Washington. There are whispers of cyberterror and espionage and a traitor in the cabinet. The President himself becomes a suspect, and then goes missing...

Set in real time, over the course of three days, The President Is Missing is one of the most dramatic thrillers in decades. And it could all really happen. The President Is Missing is Bill Clinton and James Patterson\'s totally authentic and spellbinding thriller."
			,9,48),

			(49,"The Dry","Jane Harper","31 May 2016","eng","https://goo.gl/KnNx9L",
			"After getting a note demanding his presence, Federal Agent Aaron Falk arrives in his hometown for the first time in decades to attend the funeral of his best friend, Luke. Twenty years ago when Falk was accused of murder, Luke was his alibi. Falk and his father fled under a cloud of suspicion, saved from prosecution only because of Luke’s steadfast claim that the boys had been together at the time of the crime. But now more than one person knows they didn’t tell the truth back then, and Luke is dead.

Amid the worst drought in a century, Falk and the local detective question what really happened to Luke. As Falk reluctantly investigates to see if there’s more to Luke’s death than there seems to be, long-buried mysteries resurface, as do the lies that have haunted them. And Falk will find that small towns have always hidden big secrets."
			,9,49),

			(50,"The Girl with the Dragon Tattoo","Stieg Larsson","August 2005","eng","https://goo.gl/6cVjiu",
			"A spellbinding amalgam of murder mystery, family saga, love story and financial intrigue.

A Sensational #1 Bestseller – Now a Major Motion Picture In Theaters March 2010.

It’s about the disappearance forty years ago of Harriet Vanger, a young scion of one of the wealthiest families in Sweden . . . and about her octogenarian uncle, determined to know the truth about what he believes was her murder.

It’s about Mikael Blomkvist, a crusading journalist recently at the wrong end of a libel case, hired to get to the bottom of Harriet’s disappearance . . . and about Lisbeth Salander, a twenty-four-year-old pierced and tattooed genius hacker possessed of the hard-earned wisdom of someone twice her age—and a terrifying capacity for ruthlessness to go with it—who assists Blomkvist with the investigation. This unlikely team discovers a vein of nearly unfathomable iniquity running through the Vanger family, astonishing corruption in the highest echelons of Swedish industrialism—and an unexpected connection between themselves.

It’s a contagiously exciting, stunningly intelligent novel about society at its most hidden, and about the intimate lives of a brilliantly realized cast of characters, all of them forced to face the darker aspects of their world and of their own lives."
			,9,50),


			/*
			*
			* ROHIT\'s DATA
			*
			*/


			(51,"Shelter in Place","Nora Roberts","3 May 2018","eng","https://goo.gl/VL8Ygp",
			"Sometimes, there is nowhere safe to hide.

It was a typical evening at a mall outside Portland, Maine. Three teenage friends waited for the movie to start. A boy flirted with the girl selling sunglasses. Mothers and children shopped together, and the manager at the video-game store tended to customers. Then the shooters arrived.

The chaos and carnage lasted only eight minutes before the killers were taken down. But for those who lived through it, the effects would last forever. In the years that followed, one would dedicate himself to a law enforcement career. Another would close herself off, trying to bury the memory of huddling in a ladies\' room, hopelessly clutching her cell phone--until she finally found a way to pour her emotions into her art.

But one person wasn\'t satisfied with the shockingly high death toll at the DownEast Mall. And as the survivors slowly heal, find shelter, and rebuild, they will discover that another conspirator is lying in wait--and this time, there might be nowhere safe to hide."
			,13,51),

			(52,"Sharp Objects","Gillian Flynn","26 September 2006","eng","https://goo.gl/omKHjn",
			"Fresh from a brief stay at a psych hospital, reporter Camille Preaker faces a troubling assignment: she must return to her tiny hometown to cover the murders of two preteen girls. For years, Camille has hardly spoken to her neurotic, hypochondriac mother or to the half-sister she barely knows: a beautiful thirteen-year-old with an eerie grip on the town. Now, installed in her old bedroom in her family\'s Victorian mansion, Camille finds herself identifying with the young victims—a bit too strongly. Dogged by her own demons, she must unravel the psychological puzzle of her own past if she wants to get the story—and survive this homecoming."
			,13,52),

			(53,"Dark Places","Gillian Flynn","5 May 2009","eng","https://goo.gl/D9azg4",
			"Libby Day was seven when her mother and two sisters were murdered in \'The Satan Sacrifice\' of Kinnakee, Kansas. She survived—and famously testified that her fifteen-year-old brother, Ben, was the killer. Twenty-five years later, the Kill Club—a secret secret society obsessed with notorious crimes—locates Libby and pumps her for details. They hope to discover proof that may free Ben. Libby hopes to turn a profit off her tragic history: She\'ll reconnect with the players from that night and report her findings to the club—for a fee. As Libby\'s search takes her from shabby Missouri strip clubs to abandoned Oklahoma tourist towns, the unimaginable truth emerges, and Libby finds herself right back where she started—on the run from a killer."
			,13,53),

			(54,"Before I Go to Sleep","S. J. Watson","1 April 2011","eng","https://goo.gl/FZvHVt",
			"Christine wakes up every morning in an unfamiliar bed with an unfamiliar man. She looks in the mirror and sees an unfamiliar, middle-aged face. And every morning, the man she has woken up with must explain that he is Ben, he is her husband, she is forty-seven years old, and a terrible accident two decades earlier decimated her ability to form new memories.

Every day, Christine must begin again the reconstruction of her past. And the closer she gets to the truth, the more unbelievable it seems. "
			,13,54),

			(55,"Everything We Give","Kerry Lonsdale","3 July 2018","eng","https://goo.gl/vtK6op",
			"Award-winning photographer Ian Collins made only one mistake in life, but it cost his mother her freedom and destroyed their family, leaving Ian to practically raise himself. For years he’s been estranged from his father, and his mother has lived off the grid. For just as long, he has searched for her.

Now, Ian seemingly has it all—national recognition for his photographs; his loving wife, Aimee; and their adoring daughter, Caty. Only two things elude him: a feature in National Geographic and finding his mother. When the prized magazine offers him his dream project on the same day that Aimee’s ex-fiancé, James, returns bearing a message for Ian but putting a strain on his marriage, Ian must make a choice: chase after a coveted assignment or reconnect with a mysterious woman who might hold the key to putting his past to rest. But the stakes are high, because Ian could lose the one thing he holds most dear: his family."
			,13,55),


			(56,"The Smartest Kids in the World","Amanda Ripley","13 August 2013","eng","https://goo.gl/5EaQfC",
			"Through the compelling stories of three American teenagers living abroad and attending the world’s top-notch public high schools, an investigative reporter explains how these systems cultivate the \'smartest\' kids on the planet.

America has long compared its students to top-performing kids of other nations. But how do the world’s education superpowers look through the eyes of an American high school student? Author Amanda Ripley follows three teenagers who chose to spend one school year living and learning in Finland, South Korea, and Poland. Through their adventures, Ripley discovers startling truths about how attitudes, parenting, and rigorous teaching have revolutionized these countries’ education results.

In The Smartest Kids in the World, Ripley’s astonishing new insights reveal that top-performing countries have achieved greatness only in the past several decades; that the kids who live there are learning to think for themselves, partly through failing early and often; and that persistence, hard work, and resilience matter more to our children’s life chances than self-esteem or sports.

Ripley’s investigative work seamlessly weaves narrative and research, providing in-depth analysis and gripping details that will keep you turning the pages. Written in a clear and engaging style, The Smartest Kids in the World will enliven public as well as dinner table debates over what makes for brighter and better students."
			,14,56),

			(57,"The End of Education","Neil Postman","26 September 1995","eng","https://goo.gl/YQfnt1",
			"Postman suggests that the current crisis in our educational system derives from its failure to supply students with a translucent, unifying \'narrative\' like those that inspired earlier generations. Instead, today\'s schools promote the false \'gods\' of economic utility, consumerism, or ethnic separatism and resentment. What alternative strategies can we use to instill our children with a sense of global citizenship, healthy intellectual skepticism, respect of America\'s traditions, and appreciation of its diversity? In answering this question, The End of Education restores meaning and common sense to the arena in which they are most urgently needed.

\'Informal and clear...Postman\'s ideas about education are appealingly fresh.\'--New York Times Book Review"
			,14,57),

			(58,"Let Us C","Yashavant Kanetkar","20 November 2002","eng","https://goo.gl/e7NZY9",
			"With the expanding horizon of digital technology, there is also an increasing need for software professionals with a good command of a variety of programming languages. The C language is one of the basic skill sets in a programmer’s portfolio.

There has been an explosion in the number of programming languages and different development platforms. However, the C programming language has retained its popularity across the decades.

Let Us C is a great resource from which one can learn C programming. It does not assume any previous knowledge of C or even the basics of programming. It covers everything from basic programming concepts and fundamental C programming constructs.

The book explains basic concepts like data types and control structures, decision control structure and loops, creating functions and using the standard C library. It also covers C preprocessor directives, handling strings, and error handling.

It also discusses C programming under different environments like Windows and Linux. The book uses a lot of programming examples to help the reader gain a deeper understanding of the various C features.

This book also aims to help prepare readers not just for the theoretical exams, but also the practical ones. It builds their C programming skills. It also helps in getting through job interviews. There is a separate section in the book that discusses the most Frequently Asked Questions in job interviews.

This is the 13th edition of the book and it covers all levels of C programming, from basic to intermediate and advanced levels of expertise. With clear concept coverage, simple instructions and many illustrative examples, Let Us C teaches programming and C language features effectively and easily."
			,14,58),

			(59,"Java: The Complete Reference","Herbert Schildt","1996","eng","https://goo.gl/yLkdp7",
			"Java is a widely used language in the computer industry. Its importance and influence is strongly felt as it’s still the first and best choice when it comes to writing programs for developing web-based applications. It’s used not only across PCs and laptops, but also in smartphones. Android programming, for instance, uses Java.

This edition of Java: The Complete Reference comes about as a result of the language’s dynamic nature. Java regularly undergoes change and upgradation, primarily for the purpose of keeping up with the new and ever-changing demands of the computing world. The release of this new edition reflects this dynamism.

The book has a large intended audience, catering to the needs of both the inexperienced and professional programmers. The fundamental aspects of Java are covered in sufficient detail so that the beginner doesn’t get lost in the subject matter. And at the same time, the professional is provided with a coverage of the more advanced features of Java.

Java: The Complete Reference is a handy manual that contains the fundamental programming principles, keywords, and syntax generally used when writing programs based on Java. It consists of four parts, and in each part a different area of the subject is emphasized. There are thirty four chapters in all, some of the chapters being An Overview of Java, The History and Evolution of Java, Introducing Classes, Data Types, Variables, and Arrays, String Handling, Networking, Exploring NIO, Introducing the AWT: Working with Windows, Graphics, and Text, Java Beans, Servlets, and Financial Applets and Servlets."
			,14,59),

			(60,"Learn Python the Hard Way: A Very Simple Introduction to the Terrifyingly Beautiful World of Computers and Code","Zed Shaw","19 September 2013","eng","https://goo.gl/2YTaJJ",
			"Zed Shaw has perfected the world\'s best system for learning Python. Follow it and you will succeed-just like the hundreds of thousands of beginners Zed has taught to date! You bring the discipline, commitment, and persistence; the author supplies everything else.

 

In Learn Python the Hard Way, Third Edition, you\'ll learn Python by working through 52 brilliantly crafted exercises. Read them. Type their code precisely. (No copying and pasting!) Fix your mistakes. Watch the programs run. As you do, you\'ll learn how software works; what good programs look like; how to read, write, and think about code; and how to find and fix your mistakes using tricks professional programmers use. Most importantly, you\'ll learn the following, which you need to start writing excellent Python software of your own:

Installing a complete Python environment
Organizing and writing code
Basic mathematics
Variables
Strings and text
Interacting with users
Working with files
Looping and logic
Data structures using lists and dictionaries
Program design
Object-oriented programming
Inheritance and composition
Modules, classes, and objects
Python packaging
Debugging
Automated testing
Basic game development
Basic web development
It\'ll be hard at first. But soon, you\'ll just get it-and that will feel great!

 

This tutorial will reward you for every minute you put into it. Soon, you\'ll know one of the world\'s most powerful, popular programming languages. You\'ll be a Python programmer.

 

Watch Zed, too! The accompanying DVD contains 5+ hours of passionate, powerful teaching: a complete Python video course!"
			,14,60);',

		// 'books_read' => 'INSERT INTO books_read (user_id,book_id) VALUES
		// 	(1,1),
		// 	(1,4),
		// 	(1,6),
		// 	(1,5),
		// 	(2,3),
		// 	(2,4),
		// 	(2,1),
		// 	(3,5),
		// 	(3,7),
		// 	(3,8),
		// 	(4,2),
		// 	(4,8),
		// 	(4,4);',

		// 'groups' => 'INSERT INTO groups(cat_id) VALUES
		// 	(1),
		// 	(2),
		// 	(3),
		// 	(4),
		// 	(5),
		// 	(6),
		// 	(7);',

		// 'group_members' => 'INSERT INTO group_members(group_id,user_id) VALUES
		// (1,1),
		// (1,2),
		// (2,1),
		// (2,2),
		// (2,4),
		// (3,2),
		// (3,4),
		// (4,1),
		// (4,3),
		// (5,1),
		// (6,3),
		// (7,3),
		// (7,4);'



			/*		'booksOnSale' => 'CREATE TABLE IF NOT EXISTS `books_on_sale`(
			booksonsale_id INT PRIMARY KEY AUTO_INCREMENT,
			book_id INT,
			user_id INT,
			price FLOAT,
			stock INT,
			date_t DATE,
			FOREIGN KEY (book_id) REFERENCES books (book_id),
			FOREIGN KEY (user_id) REFERENCES users (user_id)*/

			'books_on_sale' => 'INSERT INTO books_on_sale(booksonsale_id,book_id,user_id,price,stock) VALUES
			(1,1,1,90,5),
			(2,2,1,190,5),
			(3,10,1,190,5),
			(4,11,1,290,5),
			(5,16,1,390,5),
			(6,17,1,190,5),
			(7,22,1,90,5),
			(8,23,1,190,5),
			(9,28,1,90,5),
			(10,29,1,290,5),
			(11,32,1,190,5),
			(12,33,1,290,5),
			(13,38,1,390,5),
			(14,39,1,190,5),
			(15,44,1,190,5),
			(16,45,1,180,5),
			(17,49,1,70,5),
			(18,50,1,130,5),

			(19,3,2,90,5),
			(20,4,2,190,5),
			(21,5,2,190,5),
			(22,6,2,290,5),
			(23,7,2,390,5),
			(24,8,2,190,5),
			(25,9,2,90,5),
			(26,12,2,190,5),
			(27,13,2,90,5),
			(28,14,2,290,5),
			(29,15,2,190,5),
			(30,18,2,290,5),
			(31,19,2,390,5),
			(32,20,2,190,5),
			(33,21,2,190,5),
			(34,24,2,180,5),
			(35,25,2,70,5)'
	);

	foreach($demoData as $table_name => $query)
	{
		$result = mysqli_query($conn,$query);
		if(!$result)
		{
			echo "VALUES IN " .$table_name . " were not inserted" . mysqli_error($conn) . "<br/>";
		}
		else{
			echo true . "<br/>";
		}
	}

 ?>