<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231223082520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
// PLANTES
        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Monstera',
            12,
            79.99,
            'BOTANICIA',
            'Nom scientifique : Monstera deliciosa Famille : Araceae Type de plante : Plante grimpante à feuilles larges et trouées. Temps de croissance : Croissance modérée à rapide, les jeunes plants peuvent prendre plusieurs années pour devenir des spécimens matures. Conseils d''entretien : Préfère une lumière indirecte vive et un sol bien drainé. Arroser régulièrement mais laisser sécher entre les arrosages. Supporte bien l''humidité ambiante. Pays d''origine : Régions tropicales d''Amérique centrale et du Sud.',
            'Plante',
            'Image/monstera.png')");


        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Rosier',
            89,
            24.99,
            'BOTANICIA',
            'Nom scientifique : Rosa Famille : Rosaceae Type de plante : Arbuste à fleurs. Temps de croissance : Variable selon les variétés, certaines peuvent fleurir dans la première année, tandis que d''autres peuvent prendre quelques années. Conseils d''entretien : Besoin de plein soleil et d''un sol bien drainé. La taille régulière favorise la floraison. Pays d''origine : Asie, Europe, Afrique du Nord, Amérique du Nord.',
            'Plante',
            'Image/rosier.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Lierre',
            36,
            5.99,
            'BOTANICIA',
            'Nom scientifique : Hedera Helix Famille : Araliaceae Type de plante : Plante grimpante à feuillage persistant. Temps de croissance : Croissance modérée à rapide selon les conditions. Conseils d''entretien : Tolère une gamme de conditions lumineuses mais préfère une lumière indirecte. Arrosage régulier et taille pour contrôler sa croissance. Pays d''origine : Europe, Afrique du Nord, Asie.',
            'Plante',
            'Image/lierre.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Pelouse',
            7,
            12.49,
            'BOTANICIA',
            'Nom scientifique : Poa pratensis, Lolium perenne, etc Famille : Poaceae Type de plante : Herbacée à croissance rasante. Temps de croissance : La croissance dépend de la saison, mais la pelouse peut prendre plusieurs mois pour s''établir pleinement. Conseils d''entretien : Arrosage régulier, tonte régulière, et entretien saisonnier (scarification, fertilisation, etc.). Pays d''origine : Différentes espèces sont originaires de diverses régions du monde.',
            'Plante',
            'Image/pelouse.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Plante-pénis',
            2,
            259.99,
            'BOTANICIA',
            'Nom scientifique : Amorphophallus titanum Famille : Araceae Type de plante : Plante à fleurs à grande inflorescence. Temps de croissance : Peut prendre plusieurs années pour fleurir et produit rarement une fleur. Conseils d''entretien : Besoins spécifiques en chaleur, humidité et espace. Peu d''entretien nécessaire en dehors des conditions requises pour la floraison. Pays d''origine : Îles de Sumatra et de Java, en Indonésie.',
            'Plante',
            'Image/plantepenis.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Châtaignier de Guyane',
            24,
            39.99,
            'BOTANICIA',
            'Nom scientifique : Pachira aquatica Famille : Fagaceae Type de plante : Arbre fruitier produisant des châtaignes. Temps de croissance : Peut prendre plusieurs années pour commencer à produire des fruits. Conseils d''entretien : Besoin de plein soleil et d''un sol bien drainé. Taille pour former l''arbre et encourager la production de fruits. Pays d''origine : Régions de la Guyane en Amérique du Sud.',
            'Plante',
            'Image/chataignierguyanne.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Aloe vera',
            58,
            9.99,
            'BOTANICIA',
            'Nom scientifique : Aloe barbadensis miller Famille : Asphodelaceae Type de plante : Plante succulente à feuilles charnues. Temps de croissance : Croissance relativement lente, prenant plusieurs années pour atteindre une taille mature. Conseils d''entretien : Préfère un sol bien drainé et une exposition ensoleillée. Résiste bien à la sécheresse, mais un arrosage modéré est recommandé. Éviter l''excès d''eau pour éviter la pourriture des racines. Pays d''origine : Régions méditerranéennes et certaines parties d''Afrique.',
            'Plante',
            'Image/aloevera.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Marguerite',
            112,
            2.99,
            'BOTANICIA',
            'Nom scientifique : Leucanthemum vulgare Famille : Asteraceae Type de plante : Plante herbacée à fleurs. Temps de croissance : Croissance relativement rapide, fleurit généralement dans la première année. Conseils d''entretien : Préfère une exposition ensoleillée et un sol bien drainé. Tailler les fleurs fanées pour prolonger la floraison. Pays d''origine : Régions d''Europe et d''Asie tempérées.',
            'Plante',
            'Image/marguerite.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Coleus',
            49,
            4.99,
            'BOTANICIA',
            'Nom scientifique : Plectranthus scutellarioides Famille : Lamiaceae Type de plante : Plante herbacée à feuillage coloré. Temps de croissance : Croissance rapide, souvent utilisée comme plante annuelle dans les régions tempérées. Conseils d''entretien : Préfère une lumière indirecte et des sols riches et bien drainés. Éliminer les fleurs pour encourager la croissance des feuilles. Pays d''origine : Régions tropicales d''Asie et d''Afrique.',
            'Plante',
            'Image/coleus.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Plante carnivore',
            23,
            10.99,
            'BOTANICIA',
            'Nom scientifique : Dionaea muscipula pour la dionée, Nepenthes spp. pour les népenthes (il existe plusieurs espèces de plantes carnivores) Famille : Dionaea muscipula (Droseraceae), Nepenthes spp. (Nepenthaceae) Type de plante : Plantes insectivores. Temps de croissance : Variable selon l''espèce, mais généralement une croissance lente. Conseils d''entretien : Besoins spécifiques en lumière, sol et humidité. La plante doit être arrosée avec de l''eau déminéralisée ou de l''eau de pluie. La nourriture (insectes) est souvent nécessaire pour les plantes carnivores. Pays d''origine : Dionaea muscipula est originaire des États-Unis (Caroline du Nord et Caroline du Sud), Nepenthes spp. se trouve principalement en Asie du Sud-Est, en Australie et dans les îles du Pacifique.',
            'Plante',
            'Image/plantecarnivore.png'
        )");


        // Arbre
        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Érable du Japon',
            12,
            225.99,
            'BOTANICIA',
            'Nom scientifique : Acer palmatum Famille : Sapindaceae Type de plante : Arbre à feuilles caduques, souvent cultivé pour son feuillage décoratif. Temps de croissance : Il peut prendre plusieurs années pour atteindre une taille significative. La croissance peut être lente à modérée. Conseils d''entretien : Préfère un sol bien drainé et légèrement acide. Il apprécie les endroits partiellement ombragés et nécessite une taille modérée pour maintenir sa forme. Pays d''origine : Japon, Corée, Chine.',
            'Arbre',
            'Image/erablejapon.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Cerisier à fleurs',
            26,
            36.99,
            'BOTANICIA',
            'Nom scientifique : Prunus serrulata Famille : Rosaceae Type de plante : Arbre à fleurs ornementales. Temps de croissance : Les jeunes plants peuvent fleurir dans les premières années. La croissance varie, mais ils peuvent atteindre une taille mature en 10 à 20 ans. Conseils d''entretien : Préfère un sol bien drainé et une exposition ensoleillée. Une taille légère après la floraison peut aider à stimuler la croissance. Pays d''origine : Japon, Chine.',
            'Arbre',
            'Image/cerisierfleur.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Magnolia',
            34,
            49.99,
            'BOTANICIA',
            'Nom scientifique : Magnolia spp Famille : Magnoliaceae Type de plante : Arbre à feuilles persistantes ou caduques, souvent cultivé pour ses grandes fleurs. Temps de croissance : La croissance varie selon l''espèce et les conditions, généralement de modérée à rapide pour certaines variétés. Conseils d''entretien : Préfère un sol bien drainé et une exposition ensoleillée à mi-ombre. La taille est rarement nécessaire sauf pour équilibrer la forme de l''arbre. Pays d''origine : Asie, Amérique du Nord.',
            'Arbre',
            'Image/magnolia.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Cocotier',
            119,
            25.99,
            'BOTANICIA',
            'Nom scientifique : Cocos nucifera Famille : Arecaceae Type de plante : Palmier tropical producteur de noix de coco. Temps de croissance : Les cocotiers peuvent prendre plusieurs années pour produire des noix de coco, et leur croissance dépend des conditions climatiques tropicales. Conseils d''entretien : Besoin de chaleur, d''humidité et de sols bien drainés. Sensible au froid, donc réservé aux climats tropicaux. Pays d''origine : Régions tropicales d''Asie et d''Amérique.',
            'Arbre',
            'Image/cocotier.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Poirier',
            58,
            20.99,
            'BOTANICIA',
            'Nom scientifique : Pyrus spp. (plusieurs espèces de poiriers) Famille : Rosaceae Type de plante : Arbre fruitier à feuilles caduques. Temps de croissance : Peut prendre quelques années pour commencer à produire des fruits significatifs, mais peut varier selon la variété. Conseils d''entretien : Besoin de plein soleil et d''un sol bien drainé. La taille régulière peut aider à former l''arbre et à encourager la production de fruits. Pays d''origine : Régions tempérées d''Europe et d''Asie.',
            'Arbre',
            'Image/poirier.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Saule pleureur',
            3,
            334.99,
            'BOTANICIA',
            'Nom scientifique : Salix babylonica Famille : Salicaceae Type de plante : Arbre à feuilles caduques, connu pour ses branches retombantes. Temps de croissance : Croissance rapide, pouvant atteindre une taille importante en quelques années. Conseils d''entretien : Préfère un sol humide et bien drainé. La taille régulière des branches mortes ou malades peut aider à maintenir sa forme. Sensible aux maladies fongiques dans certaines conditions. Pays d''origine : Chine.',
            'Arbre',
            'Image/saulepleureur.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Chêne à feuilles rouges',
            56,
            69.99,
            'BOTANICIA',
            'Nom scientifique : Quercus rubra Famille : Fagaceae Type de plante : Arbre à feuilles caduques, souvent cultivé pour son feuillage automnal rouge. Temps de croissance : Croissance modérée à rapide, atteignant une taille mature en plusieurs décennies. Conseils d''entretien : Préfère un sol bien drainé et une exposition ensoleillée à mi-ombre. La taille est rarement nécessaire, mais peut être effectuée pour l''élagage structurel. Pays d''origine : Amérique du Nord.',
            'Arbre',
            'Image/chenefeuillerouge.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Olivier',
            32,
            129.99,
            'BOTANICIA',
            'Nom scientifique : Olea europaea Famille : Oleaceae Type de plante : Arbre à feuilles persistantes, cultivé pour ses fruits (les olives) et son feuillage décoratif. Temps de croissance : Croissance lente à modérée, pouvant prendre plusieurs années pour atteindre une taille mature. Conseils d''entretien : Préfère un sol bien drainé et une exposition ensoleillée. La taille régulière peut être nécessaire pour maintenir la forme et encourager la production de fruits. Pays d''origine : Régions méditerranéennes.',
            'Arbre',
            'Image/olivier.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Arbre à soie',
            24,
            75.99,
            'BOTANICIA',
            'Nom scientifique : Albizia julibrissin Famille : Fabaceae Type de plante : Arbre à feuilles caduques, connu pour ses fleurs roses et son feuillage fin. Temps de croissance : Croissance modérée à rapide, atteignant une taille considérable en quelques années. Conseils d''entretien : Tolère différents types de sols mais préfère un sol bien drainé. La taille peut être pratiquée pour contrôler la forme. Pays d''origine : Asie.',
            'Arbre',
            'Image/arbresoie.png'
        )");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Ananas',
            3,
            49.99,
            'BOTANICIA',
            'Nom scientifique : Ananas comosus Famille : Bromeliaceae Type de plante : Plante tropicale herbacée à fruits comestibles. Temps de croissance : Les ananas peuvent prendre de 18 à 24 mois pour atteindre la maturité et produire un fruit. Conseils d''entretien : Besoin de chaleur et d''humidité, ainsi que d''un sol bien drainé. La plante peut être cultivée à partir du haut d''un fruit mûr, mais nécessite un environnement tropical ou subtropical pour croître correctement. Pays d''origine : Régions tropicales d''Amérique du Sud et d''Amérique centrale.',
            'Arbre',
            'Image/ananas.png'
        )");


        // Machine
        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Débroussailleuse',
            32,
            829.00,
            'STIHL',
            'Débroussailleuse à dos Modèle : FS261C-E Caractéristiques : Cylindrée : 41,6 cm³ / Puissance : 2 kW / Poids : 7,8 kg / Niveau de pression sonore 100 dB(A) / Niveau de pression sonore 99 dB(A) / Niveau de puissance acoustique : 109 dB (A) / Niveau de puissance acoustique : 109 dB (A) / Niveau de vibrations gauche/droite outils fils : 4,8/6,1 m/s² / Taux de vibrations côté gauche : 5 m/s² / Taux de vibrations côté droit : 5,9 m/s² / Longueur hors tout : 180 cm / Diamètre de cercle de coupe : 520 mm / Outil de coupe standard : Couteau taillis 300-3 / Capacité du réservoir : 0,75 L / CO2 : 840 g/kWh Référence : 41472000350',
            'Machine',
            'Image/grandedebroussailleuse.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Débroussailleuse',
            12,
            1229.00,
            'STIHL',
            'Débroussailleuse à dos Modèle : FR 410 Caractéristiques : Cylindrée : 41,6 cm³ / Puissance : 2 kW / Poids : 10,7 kg / Niveau de pression sonore : 100 dB (A) / Niveau de pression sonore : 100 dB (A) / Taux de vibrations côté gauche : 3,7 m/s² / Taux de vibrations côté droit : 3,7 m/s² / Taux de vibrations côté gauche : 2,3 m/s² / Taux de vibrations côté droit : 2 m/s² / Longueur hors tout : 28 m / Diamètre de cercle de coupe : 420 mm / Outil de coupe standard : Tête faucheuse AutoCut 36-2 / Capacité du réservoir : 0,75 L Référence : 41472000363', 
            'Machine',
            'Image/debroussailleusedos.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Motobineuse',
            53,
            889.00,
            'STAUB',
            'Motobineuse compacte Modèle : ST 2966 DE Caractéristiques : Moteur : RATO R210 - Démarrage électrique / Puissance : 4,2 kW / 5,7 ch / Cylindrée : 212 cm³ / Vitesses : 1 AV + 1 AR par inverseur mécanique / Nombre de fraises : 3+3 / Largeur de travail : 40-60-80 cm / Disques protège-plantes : de série / Guidon : elliptique, réglable en hauteur et en déport sans outil / Pic de terrage : mobile en rotation, non réglable en hauteur / Roue de transport : de série / Poids : 53 kg / Garantie : 2 ans / Disponibilité des pièces détachées : 12 ans Référence : ???',
            'Machine',
            'Image/motobineuse.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Motoculteur',
            25,
            569.00,
            'SAINT PIERRE DU CHAMP',
            'Motoculteur Thermique Modèle : 600608 Caractéristiques : Capacité du réservoir : 3,6 L / Capacité du réservoir d''huile : Moteur 0.6L, Carter de transmission 1.2L / Compatibilité : Avec la charrue ref.600613 et l''arracheuse de pommes de terre ref.600612 / Cylindrée moteur : 212cm³ / Largeur de travail : de 80 à 110cm / Poids : 66kg / Profondeur de travail : de 15 à 30cm / Puissance max : 4.4 KW à 3600/min / Sécurité manque d''huile : Oui / Type de carburant : Essence sans plomb pure SP95 ou SP98 / Type de démarrage : Par lanceur / Type moteur : 4T OHV à refroidissement par air / Garantie : 2 ans Référence : ???',
            'Machine',
            'Image/motoculteurorange.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Motoculteur',
            17,
            599.00,
            'DUNSCH',
            'Motoculteur thermique tracté Modèle : LEA LE42212-97W21 Caractéristiques : Type De Moteur : A essence / Alimentation : Essence / Moteur : SAE 30W - SAE 15W40 spéciale motoculture / Refroidissement moteur : Refroidi par air / Puissance : 5,4 Cv / Démarrage : Manuel par lanceur / Carburant : Sans Plomb 95 E5 / Type De Traction : Tractée / Nombre De Vitesses Avant : 2 / Nombre De Vitesses Arrière : 1 / Profondeur Travail : 16 cm / Surface De Travail Conseillée : 3000 M² / Guidon : Poignée ajustable / Couleur : Noir / Hauteur : 69 cm / Profondeur : 16 cm / Poids À Vide : 70 Kg / Garantie : 3 ans / Longueur Emballage : 97 Cm / Largeur Emballage : 46 Cm / Hauteur Emballage : 69 Cm / Code transport : GEO-FEX / Classe Logistique : FREE / Cylindrée : 212 Cm3 / Largeur De Travail : 102 cm / Teinte : Rouge / Poids : 70 kg / Régime Moteur : 3600 tours/min / Puissance - Unité Watt : 4000 Référence : DU42212-97W21',
            'Machine',
            'Image/motoculteurrouge.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Motopompe',
            6,
            2189.00,
            '4EMPRO',
            'Motopompe diesel Modèle : SWT 120 D Caractéristiques : Type de pompe : Auto-amorçante / Ø du raccord d''aspiration 100 mm (4'''') / Ø du raccord de refoulement : 100 mm (4'''') / Débit maximum : 2000 L/min / Débit maximum : 120 m³/h / Pression : 2,3 bar / Hauteur manométrique totale : 23 m / Hauteur d''aspiration maximum : 8 m / Granulométrie (Ø trou de crépine) : 31 mm / Garniture mécanique : Carbone en céramique / Modèle du moteur : DY41 - ROBIN / Type du moteur : 4 Temps Diesel / Carburant : GNR ou Gasoil automobile / Capacité du réservoir : 4,5 L / Autonomie moyenne : 3 h / Dimensions : 730 x 485 x 610 mm / Dimensions : emballage 805 x 515 x 640 mm / Poids net à sec : 88 kg / Poids brut emballé : 93 kg Référence : 200004055',
            'Machine',
            'Image/motopompe.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Robot tondeuse',
            43,
            769.00,
            'ECLOZ',
            'Robot tondeuse Modèle : E-1600 Connect Caractéristiques : Bac de ramassage : Non / Fonction mulching : Oui / Réglage de la hauteur de coupe : Oui / Dimensions du colis : L.56 x l.41 x H.30 cm / Niveau sonore : 66 dB / Temps de charge à 100% : 120 min / Tension de la batterie : 28 V / Type de tondeuse : Électrique + batterie / Type de batterie : Lithium-ion / Garantie constructeur : 2 années / Hauteur de coupe max : 2 cm / Hauteur de coupe min : 6 cm / Largeur de coupe : 18 cm / Surface conseillée : 1600 m² / Indice de réparabilité : 8 Référence : 3275970038279',
            'Machine',
            'Image/petitrobottondeuse.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Robot Tondeuse',
            15,
            1719.00,
            'STIHL',
            'Robot Tondeuse Modèle : RMI 422 PC Caractéristiques : Surface à tondre max : 800 m² / Pente max : 35 % / Largeur de coupe : 20 cm / Hauteur de coupe min : 20 mm / Hauteur de coupe max : 60 mm / Durée de tonte (Ø par semaine) : 16 h / Temps de tonte max. avec charge de batterie à 100 % : 40 min / Puissance nominale : 45 W / Type de pile : Lithium-ion / Poids : 9 kg / Niveau de pression sonore mesuré LpA : 52 dB (A) / Facteur d''incertitude du niveau de pression sonore KpA : 2 dB (A) / Niveau de puissance acoustique garanti LWA : 62 dB (A) / Type de protection EN 60 529 : IPX4',
            'Machine',
            'Image/robottondeuseorange.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Scarificateur',
            59,
            799.00,
            'WEIBANG',
            'Scarificateur thermique Modèle : WB384RB Caractéristiques : Marque du moteur : BRIGGS & SRATTON / Référence du moteur : 750 Series - OHV / Cylindrée : 163 cc / Puissance nette : 3.3 kW à 3300 tr/min / Capacité du bac : 40 litres / Largeur de travail : 380 mm / Profondeur de travail : 0 à 16 mm / Roues : AV 178 mm - AR 178 mm / Carter : Acier',
            'Machine',
            'Image/scarificateur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Souffleur',
            24,
            349.00,
            'STIGA',
            'Souffleur de feuilles thermique Modèle : BL 530 V Caractéristiques : Puissance : 0.8 kW / Source d''énergie : Thermique 2-temps / Cylindrée : 27.6 cm³ / Régime du moteur : 7500 rpm / Vitesse maximale moteur : 8300 rpm / Vitesse au ralenti : 3100 rpm / Type de démarreur : Lanceur à corde / Amorçage : Oui / Étrangleur : Manuel avec retour automatique / Capacité réservoir de carburant : 0.45 L / Type de carburateur : Vanne papillon / Type de bobine d''allumage : Analogique / Type de filtre à air : Eponge / Volume d''air maximal : 10.05 m³/min / Vitesse de l''air : maximale : 72 m/s / Fonction aspirateur : Oui',
            'Machine',
            'Image/soufleur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Souffleur',
            24,
            679.00,
            'ECHO',
            'Souffleur à dos thermique Modèle : PB-580 Caractéristiques : Cylindrée : 58.2 cm³ / Puissance : 2.1 kW / Puissance : 2.9 ps / Poids à sec : 10.3 / Capacité du réservoir de carburant : 1.84 L / Consommation de carburant à la puissance maximale du moteur : 1.03 / Force de soufflage : 22.0 N / Volume d''air : 882 m³/h / Vitesse max. de l''air : 96.4 m/s / Type d''embout : Rond Droit - Rond Courbé / CO² : 983 g/kW・h',
            'Machine',
            'Image/grossoufleur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Taille-haies',
            19,
            189.00,
            'HELINGTON',
            'Taille-haies thermique Modèle : 21.7 CC Caractéristiques : Marque Marketing : Minerva-Oil / Provenance : France / Contenance de gestion : 1 Pièce / Système antivibration : Oui / Poignée inclinable : Oui / Fonction télescopique : Non / Alimentation : Thermique / Dimensions du colis : 23 x 25 x 109 cm / Nombre de lames : 2 / Cylindrée : 25.4 cm³ / Diamètre max de coupe : 28 mm /Garantie constructeur : 3 mois / Largeur de coupe : 51 cm / Longueur de la lame : 60 cm / Niveau sonore : 110 dB',
            'Machine',
            'Image/taillehaievert.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Taille-haies',
            18,
            519.00,
            'STIHL',
            'Taille-haies thermique Modèle : HS 46 Caractéristiques : Longueur de coupe : 45 cm / Cylindrée : 21,4 cm³ / Puissance : 0,65 kW / Poids : 4 kg / Niveau de pression sonore : 95 dB (A) / Niveau de puissance acoustique : 107 dB (A) / Taux de vibrations côté gauche : 4,5 m/s² / Taux de vibrations côté droit : 4,9 m/s² / Écartement des dents : 30 mm / CO2 : 887 g/kWh',
            'Machine',
            'Image/taillehaieorange.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tarière',
            26,
            379.00,
            'A&MS',
            'Tarière thermique Modèle : GARLAND AUGER 11TG-V20 Caractéristiques : Moteur : Essence 2 temps 2,5 CV / Cylindrée : 68 cc / Régime moteur au ralenti : 2700-3000/min / Consommation de carburant à pleine puissance : 1,56 kg/h / Diamètre de la tarière : 25 cm / Longueur mèche : 80 cm / Niveau de puissance acoustique garanti Lw : 115 dB (A)',
            'Machine',
            'Image/tarriere.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tondeuse',
            21,
            1069.00,
            'HONDA',
            'Tondeuse Vitesse Variable Modèle : HRX 537 Caractéristiques : Vitesse d''avancement : Progressive 0-1.64 m/s / Matériau du carter : Xenoy® / Frein de lame : Rotostop® / Mulching : Versamow™ sélecteur de mulching intégré / Réglage de coupe : 7 / Bac de ramassage : 85 L / Niveau sonore : 98 dB(A) / Temps de ramassage 100m² : 07:07 mins:secs / Temps de mulching 100m² : 03:09 mins:secs / Surface maximale conseillée : 2 000 / Longueur 1 638 mm / Largeur 585 mm / Hauteur 1 016 mm / Poids à vide : 43,9 Kg / Largeur de coupe : 53 mm / Hauteur de coupe : 19-101 mm / Moteur : OHC 4 temps / Cylindrée : 187 cm³ / Type de moteur : GCV190 / Puissance nette du moteur : 3.2/2 850 kW/ tr/min / Capacité du réservoir : 0.93 L / Capacité du réservoir d''huile : 0.55 L / Transmission Select Drive',
            'Machine',
            'Image/tondeuserouge.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tondeuse',
            19,
            639.00,
            'SABO',
            'Tondeuse à gazon Modèle : 43-COMPACT Caractéristiques : Largeur de coupe : 43 / Recommandée pour des surfaces allant jusqu''à : 800 / Volumes du Sac de ramassage : 45 L / Matériau du boîtier : Aluminium / SABO Turbostar™-System : with Système Turbostar / Fabricant de moteurs : SABO / Type de moteur : OHV / Puissance de l''appareil : 2,7 kW / Vitesse de rotation : 2800 tr/min / Réglage de la hauteur de coupe : Central / Niveaux de hauteur de coupe : 7 hauteurs  Hauteur de coupe minimale : 22 mm / Système de démarrage : Tirer le câble / Tonte Mulching : convertible avec des accessoires / Direction d''éjection : Arrière / Guidon réglable en hauteur : 3 fois / Roulement de roue avant/arrière : Roulement à billes / Niveau de puissance acoustique garanti : 96 dB(A) / Alimentation en énergie : Essence',
            'Machine',
            'Image/tondeuseverte.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tracteur tondeuse',
            9,
            1529.00,
            'JOHN DEERE',
            'Tondeuse autoportée à ramassage Modèle : X116R Caractéristiques : Moteur : Briggs & Stratton / Puissance nominale : 13.41 à 3350 tr/min / Cylindrée : 340 cm³ / Direction : 2 roues motrices / Vitesse : AV / AR: 8.9 / 5.1 km/h / Rayon de braquage : 50.8 cm / Hauteur de coupe : 25 -90 mm / Bac de ramassage de série : 300 litres',
            'Machine',
            'Image/tracteurtondeusejohndeere.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tracteur tondeuse',
            8,
            4899.00,
            'CUB CADET',
            'Tondeuse autoporté Modèle : XT2 QR106 Caractéristiques : Type : Kawasaki, bicylindre, 11,6 kW à 2200 t/min / Cylindrée 726 cm³ / Capacité du réservoir : 11,4 L / Transmission : Hydrostatique au pied / Pneumatiques Avt/Arr : 15X6/18X9,5 / Rayon de braquage : 17 cm / Type d''éjection : Arrière / Largeur : 106 cm / Hauteur de coupe : 25-100 mm / Bac de ramassage : 320 L / Indicateur de remplissage : Inclus / Buse de lavage : Inclus / Train avant : Acier / Pare-chocs : Inclus / Phare : LED / Attelage arrière : Inclus / Poids : 253 Kg / Longueur-Largeur-Hauteur : 250 / 110 / 118 cm',
            'Machine',
            'Image/tracteurtondeuse.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tronçonneuse',
            48,
            119.00,
            'OREGON',
            'Tronçonneuse thermique Caractéristiques : Type de moteur : Piston / Type de combustible : Essence / Type de poignée : Poignée souple / Longueur du produit : 850 mm / Largeur du guide-chaîne de la tronçonneuse : 1.3 mm / Longueur du guide-chaîne de la tronçonneuse : 450 mm / Largeur du guide-chaîne de la tronçonneuse (unités impériales) : 3/8'''' / Motorisation thermique : 2 temps / Système de vibration : Anti-vibration / Inclus : Cache pour guide-chaîne, clé universelle, huile de chaîne, lime à affûter, sac de luxe et manuel d''instructions / Capacité du réservoir de carburant : 0.55 L / Garantie fabricant : 2 ans / Poids net : 6.8kg Modèle : MCSWP45A',
            'Machine',
            'Image/tronconneusebleu.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tronçonneuse',
            35,
            399.00,
            'ECHO',
            'Tronçonneuse thermique Modèle : CS-370ES Caractéristiques : Cylindrée : 36.3 cm³ / Puissance : 1.41 kW / Puissance : 1.92 ps / Poids à sec : 4.6 / Capacité du réservoir de carburant : 0.41 L / Consommation de carburant à la puissance maximale du moteur : 0.76 / Pompe d''amorçage : Oui / Système d''allumage : CDI / Système de démarrage assisté : ES-start / Frein de chaîne : A inertie / Starter à retour automatique : Oui / Tendeur de chaîne : Latéral / Pas : 0.325 (3/8) pouce / Jauge : 0.050 - 0.058 / Longueur de coupe (cm) : 133, 38 (35, 40) / 13, 15 (14, 16) / Niveau de pression sonore : 98.7 dB(A) / Niveau de puissance sonore : 109.4 dB(A) / CO² : 989 (g/kW・h) 2 / Vibrations poignée avant/poignée arrière : 3.2 / 5.4 m/s²',
            'Machine',
            'Image/tronconneuserouge.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tronçonneuse',
            26,
            1999.00,
            'STIHL',
            'Tronçonneuse Modèle : MS 500i Caractéristiques : Longueur de guide-chaîne : 50-71 cm / Cylindrée : 79,2 cm³ / Puissance : 5 kW / Poids : 6,2 kg / Rapport puissance/poids : 1,24 kg/kW / Poids du système : 7,47 / 7,47 / 7,78 / 7,78 / 7,92 / 7,95 / 7,95 kg / Niveau de pression sonore : 106 dB(A) / Niveau de puissance acoustique : 119 dB(A) / Taux de vibrations côté gauche : 4,2 m/s² / Taux de vibrations côté droit : 4 m/s² / Pas de la chaîne : 3/8 '' / CO2 : 707 g/kWh',
            'Machine',
            'Image/tronconneuseorange.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tractopelle',
            1,
            34900.00,
            'MANITOU',
            'Chargeuses-pelleteuses Modèle : MBL-X 920 92P ST2 Caractéristiques : Capacité max : 4.40 L / Puissance brute : 68.50 kW / Marque du moteur : Perkins / Longueur hors-tout : 7330 mm',
            'Machine',
            'Image/tractopelle.png')");


        // Outil & Equipement
        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Râteau',
            78,
            49.99,
            'REVEX',
            'Râteau à goudron 14 dents, manche 150cm, poids 1,8 Kg',
            'Outil & Equipement',
            'Image/rateau.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Bêche',
            45,
            65.99,
            'FISKARS',
            'Bêche à bord droit tête et manche acier, manche 125 cm, poids 2 kg',
            'Outil & Equipement',
            'Image/beche.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Sécateur',
            122,
            17.99,
            'FISKARS',
            'Sécateur à lame franche Plus P521 FISKARS',
            'Outil & Equipement',
            'Image/secateur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Coupe branche',
            27,
            68.99,
            'FISKARS',
            'Coupe branches Powergear Fiskars',
            'Outil & Equipement',
            'Image/coupebranche.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Arrosoir',
            455,
            14.99,
            'ELEPHENTUS',
            'Arrosoir bleue éléphant 15 L',
            'Outil & Equipement',
            'Image/arrosoir.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Pot de fleur',
            325,
            9.99,
            'BOTANICIA',
            'Pot de fleur en terre cuite, hauteur : 26,5cm / Diamètre 29,5 - 17,5 cm, marron',
            'Outil & Equipement',
            'Image/pot.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Ciseaux à fleurs',
            126,
            19.99,
            'FISKARS',
            'Ciseaux à fleurs poignées loupe Solid SP15',
            'Outil & Equipement',
            'Image/ciseauxfleur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Balai à feuilles',
            321,
            19.99,
            'FISKARS',
            'Balai à feuilles, Tête d''outil QuikFit, 22 dents, Largeur: 43 cm, Dents en acier, Noir/Orange, QuikFit',
            'Outil & Equipement',
            'Image/balaifeuille.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Sécateur',
            156,
            29.99,
            'FISKARS',
            'Sécateur Powerlever P56 - Ø 20 Mm Double Levier Et Lame Franche',
            'Outil & Equipement',
            'Image/petitsecateur.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Gants de protection',
            325,
            19.99,
            'BRADAS',
            'Gants De Protection En Polyuréthane Pure Pretty T 7 (lot De 12 Paires)',
            'Outil & Equipement',
            'Image/gantprotection.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Gants de jardinage',
            267,
            44.99,
            'MAPA',
            'Gant Entretien Jardin Cuir - Une paire (S à L) L',
            'Outil & Equipement',
            'Image/gantjardinage.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Arrosoir',
            154,
            9.99,
            'EDA PLASTIQUES',
            'Arrosoir Parisien coloris vert métal avec pomme d''arrosage 3L',
            'Outil & Equipement',
            'Image/grandarrosoir.png')");


        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Lot de pelle et rateau',
            495,
            8.99,
            'OGEO',
            'Ensemble pelle et rateau de 23 cm de longueur',
            'Outil & Equipement',
            'Image/lotrateaux.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Petit râteau',
            195,
            6.99,
            'RIBILAND',
            'Râteau 29 cm avec manche ergonomique en bi-matière',
            'Outil & Equipement',
            'Image/petitrateaux.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Tuyau d''arrosage',
            58,
            59.99,
            'GEOLIA',
            'Tuyau d''arrosage Geocomfort longueur 50 m diamèter 18.5 mm',
            'Outil & Equipement',
            'Image/tuyau.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Récupérateur d''eau',
            39,
            209.00,
            'GARANTIA',
            'Récupérateur d''eau rectangulaire mural, Slim Stone gris granit, 500 L',
            'Outil & Equipement',
            'Image/recuperateurdeau.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Terreau',
            158,
            6.99,
            'GEOLIA',
            'Terreau universel, 50 L',
            'Outil & Equipement',
            'Image/terreau.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Billes d''argile',
            223,
            6.99,
            'GEOLIA',
            'Billes d''argile balcon et terrasse, 5 L',
            'Outil & Equipement',
            'Image/billeargile.png')");

        $this->addSql("INSERT INTO product (name, quantity, price, brand, description, category_name, photo) VALUES (
            'Engrais',
            76,
            10.99,
            'GEOLIA',
            'Engrais naturel universel 3kg 43 m²',
            'Outil & Equipement',
            'Image/engrais.png')");


    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
