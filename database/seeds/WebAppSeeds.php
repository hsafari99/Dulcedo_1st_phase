<?php

use Illuminate\Database\Seeder;

class WebAppSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* QUESTIONS */
        $questions = [
            ['Do you have any special skills or hobbies?', 'As-tu des passe-temps ou des talents particuliers ?'],
            ['Have you ever been interviewed by another model or talent agency?', 'As-tu déjà eu des interviews avec d­\'autres agences de talents ou de mannequinat ?'],
            ['Do you have any previous modelling or acting experience (pro or amateur)?', 'As-tu de l\'expérience en mannequinat ou en tant qu\'acteur/actrice (pro ou amateur) ?'],
            ['Where do you come from?', 'D\'où proviens-tu ?'],
            ['What are your favourite sports or activities?', 'Quels sont tes sports ou activités préférés ?'],
            ['What is the best piece of advice someone ever gave you?', 'Quel est le meilleur conseil que quelqu\'un t\'a donné ?'],
            ['10 years from now, you hope to...?', 'D\'ici 10 ans, tu souhaiterais... ?'],
            ['When no one is around I tend to...?', 'Lorsque je suis seul, j\'ai tendance à... ?'],
            ['What are some of your secret hidden talents?' , 'Quels seraient certains de tes talents cachés ?'],
            ['If you could buy any one thing right now, what would it be?', 'Si tu pouvais t\'acheter n\'importe quelle chose à l\'instant, qu\'est-ce que ce serait ?'],
            ['Which photographer would you like to shoot with?', 'Avec quel(le) photographe rêves-tu de travailler ?'],
            ['What is the last picture you took with your phone?', 'Quelle est la dernière photo que tu as prise avec ton téléphone ?'],
            ['What is your secret to look like a model?', 'Quel est ton secret pour ressembler à un mannequin ?'],
            ['What is the beauty product you can\'t live without?', 'Quel est le produit de beauté dont tu ne peux pas te passer ?'],
            ['What are 3 words that best describe your style?', 'Quels sont 3 mots qui décrivent bien ton style ?'],
            ['What features do you get most compliments on?', 'Sur quelles caractéristiques les gens te donnent le plus de compliments ?'],
            ['Who is your style icon?', 'Qui est ton idole de style?'],
            ['Do you have any tattoos?', 'As-tu des tattoos ?'],
            ['Do you have any piercings?', 'As-tu des piercings ?'],
            ['Are you a vegetarian?', 'Es-tu végétarien(ne) ?'],
            ['Notes on myself', 'Notes sur moi-même']
        ];

        foreach ($questions as $question) {
            $_question = new App\Models\Question;
            $_question->en = $question[0];
            $_question->fr = $question[1];
            $_question->save();
        }

        /* COUNTRIES */
        $countries = [

            //'ABW'=>'Aruba',
            'AFG'=>'Afghanistan',
            'AGO'=>'Angola',
            'AIA'=>'Anguilla',
            'ALA'=>'Åland Islands',
            'ALB'=>'Albania',
            'AND'=>'Andorra',
            'ARE'=>'United Arab Emirates',
            'ARG'=>'Argentina',
            'ARM'=>'Armenia',
            'ASM'=>'American Samoa',
            'ATA'=>'Antarctica',
            'ATF'=>'French Southern Territories',
            'ATG'=>'Antigua and Barbuda',
            'AUS'=>'Australia',
            'AUT'=>'Austria',
            'AZE'=>'Azerbaijan',
            'BDI'=>'Burundi',
            'BEL'=>'Belgium',
            'BEN'=>'Benin',
            'BES'=>'Bonaire, Sint Eustatius and Saba',
            'BFA'=>'Burkina Faso',
            'BGD'=>'Bangladesh',
            'BGR'=>'Bulgaria',
            'BHR'=>'Bahrain',
            'BHS'=>'Bahamas',
            'BIH'=>'Bosnia and Herzegovina',
            'BLM'=>'Saint Barthélemy',
            'BLR'=>'Belarus',
            'BLZ'=>'Belize',
            'BMU'=>'Bermuda',
            'BOL'=>'Bolivia, Plurinational State of',
            'BRA'=>'Brazil',
            'BRB'=>'Barbados',
            'BRN'=>'Brunei Darussalam',
            'BTN'=>'Bhutan',
            'BVT'=>'Bouvet Island',
            'BWA'=>'Botswana',
            'CAF'=>'Central African Republic',
            'CAN'=>'Canada',
            'CCK'=>'Cocos (Keeling) Islands',
            'CHE'=>'Switzerland',
            'CHL'=>'Chile',
            'CHN'=>'China',
            'CIV'=>'Côte d\'Ivoire',
            'CMR'=>'Cameroon',
            'COD'=>'Congo, the Democratic Republic of the',
            'COG'=>'Congo',
            'COK'=>'Cook Islands',
            'COL'=>'Colombia',
            'COM'=>'Comoros',
            'CPV'=>'Cape Verde',
            'CRI'=>'Costa Rica',
            'CUB'=>'Cuba',
            'CUW'=>'Curaçao',
            'CXR'=>'Christmas Island',
            'CYM'=>'Cayman Islands',
            'CYP'=>'Cyprus',
            'CZE'=>'Czech Republic',
            'DEU'=>'Germany',
            'DJI'=>'Djibouti',
            'DMA'=>'Dominica',
            'DNK'=>'Denmark',
            'DOM'=>'Dominican Republic',
            'DZA'=>'Algeria',
            'ECU'=>'Ecuador',
            'EGY'=>'Egypt',
            'ERI'=>'Eritrea',
            'ESH'=>'Western Sahara',
            'ESP'=>'Spain',
            'EST'=>'Estonia',
            'ETH'=>'Ethiopia',
            'FIN'=>'Finland',
            'FJI'=>'Fiji',
            'FLK'=>'Falkland Islands (Malvinas)',
            'FRA'=>'France',
            'FRO'=>'Faroe Islands',
            'FSM'=>'Micronesia, Federated States of',
            'GAB'=>'Gabon',
            'GBR'=>'United Kingdom',
            'GEO'=>'Georgia',
            'GGY'=>'Guernsey',
            'GHA'=>'Ghana',
            'GIB'=>'Gibraltar',
            'GIN'=>'Guinea',
            'GLP'=>'Guadeloupe',
            'GMB'=>'Gambia',
            'GNB'=>'Guinea-Bissau',
            'GNQ'=>'Equatorial Guinea',
            'GRC'=>'Greece',
            'GRD'=>'Grenada',
            'GRL'=>'Greenland',
            'GTM'=>'Guatemala',
            'GUF'=>'French Guiana',
            'GUM'=>'Guam',
            'GUY'=>'Guyana',
            'HKG'=>'Hong Kong',
            'HMD'=>'Heard Island and McDonald Islands',
            'HND'=>'Honduras',
            'HRV'=>'Croatia',
            'HTI'=>'Haiti',
            'HUN'=>'Hungary',
            'IDN'=>'Indonesia',
            'IMN'=>'Isle of Man',
            'IND'=>'India',
            'IOT'=>'British Indian Ocean Territory',
            'IRL'=>'Ireland',
            'IRN'=>'Iran, Islamic Republic of',
            'IRQ'=>'Iraq',
            'ISL'=>'Iceland',
            'ISR'=>'Israel',
            'ITA'=>'Italy',
            'JAM'=>'Jamaica',
            'JEY'=>'Jersey',
            'JOR'=>'Jordan',
            'JPN'=>'Japan',
            'KAZ'=>'Kazakhstan',
            'KEN'=>'Kenya',
            'KGZ'=>'Kyrgyzstan',
            'KHM'=>'Cambodia',
            'KIR'=>'Kiribati',
            'KNA'=>'Saint Kitts and Nevis',
            'KOR'=>'Korea, Republic of',
            'KWT'=>'Kuwait',
            'LAO'=>'Lao People\'s Democratic Republic',
            'LBN'=>'Lebanon',
            'LBR'=>'Liberia',
            'LBY'=>'Libya',
            'LCA'=>'Saint Lucia',
            'LIE'=>'Liechtenstein',
            'LKA'=>'Sri Lanka',
            'LSO'=>'Lesotho',
            'LTU'=>'Lithuania',
            'LUX'=>'Luxembourg',
            'LVA'=>'Latvia',
            'MAC'=>'Macao',
            'MAF'=>'Saint Martin (French part)',
            'MAR'=>'Morocco',
            'MCO'=>'Monaco',
            'MDA'=>'Moldova, Republic of',
            'MDG'=>'Madagascar',
            'MDV'=>'Maldives',
            'MEX'=>'Mexico',
            'MHL'=>'Marshall Islands',
            'MKD'=>'Macedonia, the former Yugoslav Republic of',
            'MLI'=>'Mali',
            'MLT'=>'Malta',
            'MMR'=>'Myanmar',
            'MNE'=>'Montenegro',
            'MNG'=>'Mongolia',
            'MNP'=>'Northern Mariana Islands',
            'MOZ'=>'Mozambique',
            'MRT'=>'Mauritania',
            'MSR'=>'Montserrat',
            'MTQ'=>'Martinique',
            'MUS'=>'Mauritius',
            'MWI'=>'Malawi',
            'MYS'=>'Malaysia',
            'MYT'=>'Mayotte',
            'NAM'=>'Namibia',
            'NCL'=>'New Caledonia',
            'NER'=>'Niger',
            'NFK'=>'Norfolk Island',
            'NGA'=>'Nigeria',
            'NIC'=>'Nicaragua',
            'NIU'=>'Niue',
            'NLD'=>'Netherlands',
            'NOR'=>'Norway',
            'NPL'=>'Nepal',
            'NRU'=>'Nauru',
            'NZL'=>'New Zealand',
            'OMN'=>'Oman',
            'PAK'=>'Pakistan',
            'PAN'=>'Panama',
            'PCN'=>'Pitcairn',
            'PER'=>'Peru',
            'PHL'=>'Philippines',
            'PLW'=>'Palau',
            'PNG'=>'Papua New Guinea',
            'POL'=>'Poland',
            'PRI'=>'Puerto Rico',
            'PRK'=>'Korea, Democratic People\'s Republic of',
            'PRT'=>'Portugal',
            'PRY'=>'Paraguay',
            'PSE'=>'Palestinian Territory, Occupied',
            'PYF'=>'French Polynesia',
            'QAT'=>'Qatar',
            'REU'=>'Réunion',
            'ROU'=>'Romania',
            'RUS'=>'Russian Federation',
            'RWA'=>'Rwanda',
            'SAU'=>'Saudi Arabia',
            'SDN'=>'Sudan',
            'SEN'=>'Senegal',
            'SGP'=>'Singapore',
            'SGS'=>'South Georgia and the South Sandwich Islands',
            'SHN'=>'Saint Helena, Ascension and Tristan da Cunha',
            'SJM'=>'Svalbard and Jan Mayen',
            'SLB'=>'Solomon Islands',
            'SLE'=>'Sierra Leone',
            'SLV'=>'El Salvador',
            'SMR'=>'San Marino',
            'SOM'=>'Somalia',
            'SPM'=>'Saint Pierre and Miquelon',
            'SRB'=>'Serbia',
            'SSD'=>'South Sudan',
            'STP'=>'Sao Tome and Principe',
            'SUR'=>'Suriname',
            'SVK'=>'Slovakia',
            'SVN'=>'Slovenia',
            'SWE'=>'Sweden',
            'SWZ'=>'Swaziland',
            'SXM'=>'Sint Maarten (Dutch part)',
            'SYC'=>'Seychelles',
            'SYR'=>'Syrian Arab Republic',
            'TCA'=>'Turks and Caicos Islands',
            'TCD'=>'Chad',
            'TGO'=>'Togo',
            'THA'=>'Thailand',
            'TJK'=>'Tajikistan',
            'TKL'=>'Tokelau',
            'TKM'=>'Turkmenistan',
            'TLS'=>'Timor-Leste',
            'TON'=>'Tonga',
            'TTO'=>'Trinidad and Tobago',
            'TUN'=>'Tunisia',
            'TUR'=>'Turkey',
            'TUV'=>'Tuvalu',
            'TWN'=>'Taiwan, Province of China',
            'TZA'=>'Tanzania, United Republic of',
            'UGA'=>'Uganda',
            'UKR'=>'Ukraine',
            'UMI'=>'United States Minor Outlying Islands',
            'URY'=>'Uruguay',
            'USA'=>'United States',
            'UZB'=>'Uzbekistan',
            'VAT'=>'Holy See (Vatican City State)',
            'VCT'=>'Saint Vincent and the Grenadines',
            'VEN'=>'Venezuela, Bolivarian Republic of',
            'VGB'=>'Virgin Islands, British',
            'VIR'=>'Virgin Islands, U.S.',
            'VNM'=>'Viet Nam',
            'VUT'=>'Vanuatu',
            'WLF'=>'Wallis and Futuna',
            'WSM'=>'Samoa',
            'YEM'=>'Yemen',
            'ZAF'=>'South Africa',
            'ZMB'=>'Zambia',
            'ZWE'=>'Zimbabwe'
        ];

        $len = sizeof($countries);
        $keys = array_keys($countries);

        for ($i = 0; $i < $len; $i++) {

            $country = new App\Models\Country;
            $country->_id = $keys[$i];
            $country->en = $countries[$keys[$i]];
            $country->fr = $countries[$keys[$i]];
            $country->save();
        }

        /* SOURCES */
        $sources_en = [

            'WEB' => 'Online Search.',
            'EVT' => 'At an event.',
            'RAD' => 'On the radio.',
            'SCT' => 'I was scouted.',
            'POS' => 'On posters.',
            'WOM' => 'By word of mouth.',
            'NEW' => 'In the newspapers.',
            'SOC' => 'On social media.',
        ];

        $sources_fr = [

            'WEB' => 'Recherche en Ligne.',
            'EVT' => 'Dans un événement.',
            'RAD' => 'À la radio.',
            'SCT' => 'Un scout m\'a repéré.',
            'POS' => 'Sur une affiche.',
            'WOM' => 'Par le bouche à oreille.',
            'NEW' => 'Dans les journeaux.',
            'SOC' => 'Dans les média sociaux.',
        ];

        $len = sizeof($sources_en);
        $keys = array_keys($sources_en);

        for ($i = 0; $i < $len; $i++) {

            $source = new App\Models\Source;
            $source->_id = $keys[$i];
            $source->en = $sources_en[$keys[$i]];
            $source->fr = $sources_fr[$keys[$i]];
            $source->save();
        }

        /* STEPS */
        $steps = [

            'APP' => 'Applying By Themself',
            'SCT' => 'Scouted',
            'TEM' => 'Temporary',
            'DEL' => 'Deleted',
            'DIP' => 'Disapproved',
            'APR' => 'Approved',
            'INV' => 'Invited',
            'MIA' => 'Did Not Attend',
            'NIN' => 'Not Invited',
            'VOT' => 'Waiting For Votes',
            'RIV' => 'Re-invited',
            'WAN' => 'Wanted',
            'NOC' => 'Did Not Sign The Contract',
            'REF' => 'Refused',
            'CON' => 'Contracted',
            'UNC' => 'Uncontracted',
        ];

        $len = sizeof($steps);
        $keys = array_keys($steps);

        for ($i = 0; $i < $len; $i++) {

            $step = new App\Models\Step;
            $step->_id = $keys[$i];
            $step->en = $steps[$keys[$i]];
            $step->save();
        }
    }
}
