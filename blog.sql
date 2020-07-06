-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 06, 2020 at 01:56 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `article`, `id_utilisateur`, `id_categorie`, `date`, `image`) VALUES
(121, 'Comment gagner de l’argent avec un blog ?', 'Avec les avantages que le marketing digital offre à tous ceux qui veulent bien s’y intéresser, nombreux sont ceux qui créent des blogs. Abordant plusieurs secteurs, ces blogs sont des plateformes au travers desquelles, informations, connaissances, astuces et bien d’autres choses sont découverts. Certains créent des blogs juste par passion, mais d’autres le font pour en faire une source de revenu. Eh oui, la création et la gestion de votre blog peuvent vous faire gagner de l’argent. Comment alors s’y prend on pour bénéficier de ce côté rémunérateur des blogs ? C’est ce que vous êtes sur le point de découvrir. \r\n\r\nTout d\'abord, il faut savoir que nombreuses entreprises ont recours à la publicité via des bloguer pour obtenir un gain conséquent de visibilité. Quand bien même vous n’avez aucune compétence dans le secteur de tel ou tel entreprise, votre plateforme peut tout de même être utilisée comme canal de publicité. Vous, vous gagnez votre argent et l’entreprise dont vous faites la pub gagne en visibilité grâce aux différents internautes qui suivent votre blog régulièrement. En plus, ces internautes peuvent grâce à ces pubs sur votre plateforme trouver les services qui pourraient les intéresser. \r\n\r\nDans un second temps, en fonction des sujets dont traite votre blog, vous pourriez mettre en vente des e-books conçu par vous-même ou d’autres auteurs qui intéresseraient les internautes. En dehors des e-books, vos articles ou produits peuvent être mis aussi en vente. Si par exemple vous aimez parler de comment utiliser tel ou tel équipement, vous pourriez négocier avec les producteurs du produit et faire de votre plateforme, un lieu d’achat de cet équipement. Autrement dit, vous servez d’intermédiaire entre les producteurs et les clients. Tout ceci vous fait gagner de l’argent pour arrondir vos fins du mois. \r\n\r\nLes articles sponsorisés sont un moyen super efficace pour gagner de l’argent avec son blog. Etant en partenariat avec certaines maisons de production de produits, vous écrivez sur ces produits soit pour les faire connaitre, soit pour motiver les internautes à les acheter et etc. Peu importe la raison, vous gagnez de l’argent. Pour chaque article écrit, vous bénéficiez d’un montant bien défini au préalable. Pour réussir cette astuce, il faudrait tout de même que vous ayez quelques notions dans la rédaction. Il est vrai qu’une fois que vous avez un blog, vous maitrisez un peu les règles de rédaction. Mais si vous tenez à utiliser cette astuce ou technique pour gagner de l’argent, il va falloir être encore plus pointu et pouvoir répondre aux besoins des entreprises. Enfin, pour amener beaucoup de gens à visiter votre site, il est important que les choses dont vous discutez sur ce site soit assez intéressant. Choisissez les bons termes qui sont en rapport avec votre secteur et développez-les. Ce n’est pas tout. Il faudra que la manière dont vous vous adressez aux internautes puisse plus les attirer. Cet aspect évoqué est de loin très important.', 13, 2, '2020-07-02 15:00:24', 'images/computer-768696_640.jpg'),
(122, 'Être performant sur Twitter', 'Excellent moyen de communication depuis sa création, Twitter est devenu inéluctable. Cumulant plus de 300 millions d’utilisateurs dans le monde, Twitter est un réseau social qui occupe une place importante dans cet univers social. Facile à utiliser, environ un demi-milliard de tweets sont diffusés chaque jour. Autrement dit, pour être visible et être performant, il faut savoir s’y prendre en respectant les bonnes manières et règlements du réseau social. Comment être performant sur Twitter ? Voici nos recommandations pour y arriver.\r\n\r\nTout d\'abord, il faut bien définir son nom d\'utilisateur : En principe, il faut insérer son nom et prénom afin de déterminer votre identifiant. Ce qui permettra aux autres abonnés de vous retrouver facilement. Dans le cas où l’identifiant existe déjà, il est recommandé de d’inverser le nom et le prénom ou d’y insérer un symbole, un chiffre ou une variante.\r\n\r\nEnsuite, il faut adopter une image d\'arrière-plan pour vous représenter. On retrouve sur plusieurs comptes l’absence d’image d’arrière-plan. Cette erreur met en péril la crédibilité de votre compte. Pour ce faire, il faut définir une image qui est en concordance avec vous. Mais également, il faut poster une photographie ou un logo de bonne qualité.\r\n\r\nD\'autre part, il faut prendre soin de la description du profil.Borné en caractères, il est primordial de saturer cette zone du profil afin d’informer certains twitos sur vos aptitudes, vos penchants, votre situation professionnelle ou votre société. Ces informations doivent être incorporer sous forme de hashtag “#” et surtout, il ne faut pas en exagérer. \r\n\r\nAutre chose, vous avez la possibilité d’incorporer d’autres liens sous la description. À cet effet, vous pouvez y ajouter votre blog ou votre profil LinkedIn et ainsi faire votre promotion.\r\n\r\nDe plus, pour avoir un compte performant et suivi, il est recommandé de publier régulièrement. Mais surtout n’en abuser pas. Il est conseillé de poster 4 à 5 fois par jour. Et surtout tenez compte de la qualité de ce que vous publiez et non de la quantité. En outre au cours de vos publications, mettez au maximum 2 hashtags. Pourquoi ? Parce que, plusieurs enquêtes ont révélé le nombre d’auditeurs sont plus nombreux pour une publication contenant un ou deux hashtags. Ce faisant, vous pouvez opter pour des outils comme Ritetag ou Hashtagify. \r\n\r\nPour finir, demeurer succinct et surtout rester focus avec des publications d’au plus 140 caractères. Et respectez cette règle d’or un sujet, un message, un Tweet.', 22, 2, '2020-07-04 15:26:13', 'images/twitter-2617270_1920.jpg'),
(123, 'Qu’est-ce que le slow business ?', 'Le verbe slow (ralentir) se conjugue chaque jour avec davantage de domaines. Parentalité, nutrition, vie privée, la slow life promeut une meilleure qualité d’existence. La vie lente multiplie ses émules avides de bien-être. Pour la mettre en action, il suffirait de repenser son quotidien et de prendre le temps d’apprécier chaque moment. Ce concept atteint désormais le monde professionnel. Qu’en est-il du travail lent c’est-à-dire du slow business ?\r\n\r\nFatigue, stress voire burn out sont les maux qui affligent et effraient les travailleurs. Dirigeants ou employés, ils subissent le rythme infernal imposé par une société et une économie glorifiant la rapidité. Rentabilité, communication accélérée assujettissent les professionnels.\r\n\r\nEn réaction à cette frénésie ambiante, une pensée divergente est née. Des entrepreneurs à contre-courant défient la vitesse des organisations qu’ils créent ou accompagnent. Loin de prôner une lenteur à toute épreuve, le slow business invite à la réflexion. Il s’attaque aux rythmes imposés. Inventer de nouveaux repères temporels est la clé du travail mesuré. Patience et endurance remplacent frénésie et course contre la montre.\r\n\r\nConcrètement, le plus rapide ne garantit pas le meilleur résultat. Prendre du recul offre l’occasion d’agir de manière plus pertinente. Et cela peut faire la différence. Trouver un nouvel équilibre professionnel correspond à accepter les périodes de latence. Elles sont alors mises au service de moments plus productifs.\r\n\r\nDe plus, mieux gérer son temps de travail pour une vie plus équilibrée. Guider ses équipes en slow business dans le but d’une plus grande efficacité. Voici le nouvel art de vivre en entreprise. L’alternance de réactivité et de décélération permet alors d’atteindre la performance optimale.\r\n\r\nD\'autre part, le slow business accorde aux employés la gestion autonome de leur temps de travail. Les évaluations ne reposent plus sur le quota horaire de présence. Finies les heures supplémentaires vues comme un investissement flatteur du salarié. Seul les résultats comptent.\r\n\r\nNe pas oeuvrer moins mais mieux. Inspirée des pays anglo-saxons, la démarche du travail conscient fait de plus en plus d’émules en France. Aligner les heures d’arrivée au bureau des salariés avec leur rythmes biologiques ou opter pour l’agenda entièrement individualisé. Telles sont les applications concrètes du slow business.\r\n\r\nLa responsabilisation des collaborateurs contribue à la productivité de la société. Limiter les réunions au profit du temps de discernement avant l’action satisfait les entrepreneurs.\r\n\r\n', 23, 1, '2020-07-04 15:35:22', 'images/laptop-2592500_1920.jpg'),
(124, 'Qu’est-ce que le marketing digital ?', 'Le marketing digital désigne des activités marketing faites en ligne pour entrer en contact avec des clients ou prospects et pour promouvoir des produits et services. Le but étant d’atteindre des objectifs précis et mesurables. Le marketing digital met donc le client au cœur de sa stratégie contrairement au marketing traditionnel.\r\n\r\nAvant de comprendre ce qu’est le marketing digital, il est important de comprendre les objectifs du marketing en lui-même. Quelle est sa fonction et à quoi sert-il ?\r\n\r\nLes actions marketing permettent de faire connaître les produits ou services et d’en accroître leur visibilité auprès d’une audience cible. C’est une science qui consiste à concevoir l’offre d’un produit en fonction de l’analyse des attentes des consommateurs.\r\n\r\nDu site web de votre entreprise aux différents aspects du branding en ligne (publicité digital, e-mail marketing, brochures web, etc.), le marketing digital couvre un large spectre de tactiques et de contenus. \r\n\r\nLes entreprises utilisent le marketing digital ou font appel à une agence de marketing digital parce qu’une stratégie digitale offre de multiples avantages, applicables à tous types d’entreprises, de taille et de moyens différents : Ainsi, Le marketing digital permet une interaction directe avec le client. Les informations obtenues sur les consommateurs vous aident à adapter l’offre et à proposer un produit ou service personnalisé qui correspond à leurs besoins, il favorise la fidélisation et la satisfaction des clients par une relation durable et de qualité et permet aussi de faire des économies de coût et de budget : s’offrir un site web coûte moins cher qu’installer une boutique physique.\r\nLe marketing digital crée une disponibilité 7 j/7, 24 h/24 de votre entreprise. Le gain de visibilité améliore votre image de marque et permet de toucher un public plus large…\r\n', 22, 3, '2020-07-04 15:51:40', 'images/entrepreneur-593357_1920.jpg'),
(125, 'Entrepreneurs : 4 habitudes pour améliorer votre sommeil', 'Pour un entrepreneur, la gestion du temps et la productivité sont des éléments clés de la réussite. Le plein d’énergie nécessaire pour endurer de longues journées de travail dans la bonne humeur, c’est le sommeil. Mieux dormir vous permettra de mieux travailler, et de mettre toutes les chances de votre côté pour mieux développer votre entreprise. Voici donc quelques conseil pour vous aider dans votre sommeil.\r\n\r\nPourquoi se créer une routine du sommeil ? Tout commence par l’essentiel : prendre de bonnes habitudes, et s’y tenir. Il s’agit donc de se créer une routine sommeil, afin que votre corps s’y habitue et que bien dormir devienne tout naturel. Le sommeil a une influence considérable sur la régulation du tempo physiologique des hormones. En d’autres termes, une multitude de choses dans votre corps, visibles et invisibles, peuvent être modifiées de manière radicale en fonction de la qualité de votre sommeil :\r\nvotre énergie quotidienne, l’efficacité de votre mémoire, votre vigilance et vos réflexes,\r\net même votre bonne humeur générale !\r\n\r\nCe sont autant d’éléments indispensables à la vie d’un entrepreneur, qui fait face à tant de défis au cours de sa journée. Voilà pourquoi adopter de bons réflexes et se créer une routine sommeil peut tout changer.\r\n\r\nEn prenant de bonnes habitudes que l’on répète sans faute chaque soir et chaque matin, on habitue notre corps à ce que l’on appelle… la routine. On vous l’accorde, le mot ne fait pas rêver : et pourtant, le cerveau humain est très favorablement impacté par la ritualisation des actions. En effet, au bout de trois semaines de bonnes habitudes répétées sans faute, le cerveau humain finit par rendre toutes ces petites actions quotidiennes automatiques. Et, une fois que tout cela est automatique, il n’est plus nécessaire de gaspiller de l’énergie à y penser ! Moralité : si vous réussissez à vous astreindre à trois semaines de bonnes habitudes pour votre sommeil, votre cerveau devrait prendre le relais et faire tout seul le travail à votre place par la suite.', 22, 2, '2020-07-04 16:07:30', 'images/woman-918981_640.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'Organisation'),
(2, 'Conseils'),
(3, 'Témoignages');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL,
  `commentaire` varchar(1024) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `droits`
--

CREATE TABLE `droits` (
  `id` int(11) NOT NULL,
  `nom` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `droits`
--

INSERT INTO `droits` (`id`, `nom`) VALUES
(1, 'utilisateur'),
(42, 'modérateur'),
(1337, 'administrateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_droits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `id_droits`) VALUES
(9, 'flora', '$2y$12$loEheT6wChnmlu1TV6.rSO1RflwwiPe4ttp8S9I5Sape0MX.57FbS', 'dupont@gmail.com', 42),
(12, 'amelie', '$2y$12$blyLiP6gs0Lo1edWFvGGFOI4JfNfLycMcYjSnpEaLXVmwrqJRD40e', 'amelie', 1337),
(13, 'admin', '$2y$12$QXXwJLA5r/.WxoGzk/DjUe9Fm4/iNn.6oqhYBiQwWsswyVwPdxI3K', 'admin@admin.com', 1337),
(17, 'justine', '$2y$12$aBFnvlgzJswFM44nQaPufuslwnXRnkhxx83sHAIJF0g1VjEYMpSWK', 'justine@justine.justine', 1),
(18, 'vanderluc', '$2y$12$EzVQiqwTpfOvAlY2YGuB.OJcm/LCBqknLhCPiEhBGXouJlDHq98u6', 'test@test.fr', 1),
(21, 'Florent', '$2y$12$dERgUwTByOE70xno4tMFBugSifMxOmil8dTF9EzHJ5pbBnDCxBfI6', 'florent-203@gmail.com', 1),
(22, 'Marie', '$2y$12$XDgGPOyxa4DbAS/SGh0oyu/03KRcP.gfiDav86gCsd53onsgJAZ3y', 'marie-876@hotmail.fr', 42),
(23, 'Cyril', '$2y$12$6JJ8C8CMzgJTN0LEHSstPu8MI2Igo3nkCO60kWyvG9S.8ckmNhg.e', 'cyril-zimmerman@gmail.com', 42);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
