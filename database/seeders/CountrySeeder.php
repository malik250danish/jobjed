<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\Country;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::truncate();
        $countries = array(
          array('name' => 'Afghanistan','enable' => '0'),
          array('name' => 'Albania','enable' => '0'),
          array('name' => 'Algeria','enable' => '0'),
          array('name' => 'American Samoa','enable' => '0'),
          array('name' => 'Andorra','enable' => '0'),
          array('name' => 'Angola','enable' => '0'),
          array('name' => 'Anguilla','enable' => '0'),
          array('name' => 'Antarctica','enable' => '0'),
          array('name' => 'Antigua and Barbuda','enable' => '0'),
          array('name' => 'Argentina','enable' => '0'),
          array('name' => 'Armenia','enable' => '0'),
          array('name' => 'Aruba','enable' => '0'),
          array('name' => 'Australia','enable' => '0'),
          array('name' => 'Austria','enable' => '0'),
          array('name' => 'Azerbaijan','enable' => '0'),
          array('name' => 'Bahamas','enable' => '0'),
          array('name' => 'Bahrain','enable' => '0'),
          array('name' => 'Bangladesh','enable' => '0'),
          array('name' => 'Barbados','enable' => '0'),
          array('name' => 'Belarus','enable' => '0'),
          array('name' => 'Belgium','enable' => '0'),
          array('name' => 'Belize','enable' => '0'),
          array('name' => 'Benin','enable' => '0'),
          array('name' => 'Bermuda','enable' => '0'),
          array('name' => 'Bhutan','enable' => '0'),
          array('name' => 'Bolivia','enable' => '0'),
          array('name' => 'Bosnia and Herzegowina','enable' => '0'),
          array('name' => 'Botswana','enable' => '0'),
          array('name' => 'Bouvet Island','enable' => '0'),
          array('name' => 'British Indian Ocean Territory','enable' => '0'),
          array('name' => 'Brazil','enable' => '0'),
          array('name' => 'Brunei Darussalam','enable' => '0'),
          array('name' => 'Bulgaria','enable' => '0'),
          array('name' => 'Burkina Faso','enable' => '0'),
          array('name' => 'Burundi','enable' => '0'),
          array('name' => 'Cambodia','enable' => '0'),
          array('name' => 'Cameroon','enable' => '0'),
          array('name' => 'Canada','enable' => '0'),
          array('name' => 'Cape Verde','enable' => '0'),
          array('name' => 'Cayman Islands','enable' => '0'),
          array('name' => 'Central African Republic','enable' => '0'),
          array('name' => 'Chad','enable' => '0'),
          array('name' => 'Chile','enable' => '0'),
          array('name' => 'China','enable' => '0'),
          array('name' => 'Christmas Island','enable' => '0'),
          array('name' => 'Cocos (Keeling) Islands','enable' => '0'),
          array('name' => 'Colombia','enable' => '0'),
          array('name' => 'Comoros','enable' => '0'),
          array('name' => 'Congo','enable' => '0'),
          array('name' => 'Congo, the Democratic Republic of the','enable' => '0'),
          array('name' => 'Cook Islands','enable' => '0'),
          array('name' => 'Costa Rica','enable' => '0'),
          array('name' => 'Croatia (Hrvatska)','enable' => '0'),
          array('name' => 'Cuba','enable' => '0'),
          array('name' => 'Cyprus','enable' => '0'),
          array('name' => 'Czech Republic','enable' => '0'),
          array('name' => 'Denmark','enable' => '0'),
          array('name' => 'Djibouti','enable' => '0'),
          array('name' => 'Dominica','enable' => '0'),
          array('name' => 'Dominican Republic','enable' => '0'),
          array('name' => 'East Timor','enable' => '0'),
          array('name' => 'Ecuador','enable' => '0'),
          array('name' => 'Egypt','enable' => '0'),
          array('name' => 'El Salvador','enable' => '0'),
          array('name' => 'Equatorial Guinea','enable' => '0'),
          array('name' => 'Eritrea','enable' => '0'),
          array('name' => 'Estonia','enable' => '0'),
          array('name' => 'Ethiopia','enable' => '0'),
          array('name' => 'Falkland Islands (Malvinas)','enable' => '0'),
          array('name' => 'Faroe Islands','enable' => '0'),
          array('name' => 'Fiji','enable' => '0'),
          array('name' => 'Finland','enable' => '0'),
          array('name' => 'France','enable' => '0'),
          array('name' => 'France Metropolitan','enable' => '0'),
          array('name' => 'French Guiana','enable' => '0'),
          array('name' => 'French Polynesia','enable' => '0'),
          array('name' => 'French Southern Territories','enable' => '0'),
          array('name' => 'Gabon','enable' => '0'),
          array('name' => 'Gambia','enable' => '0'),
          array('name' => 'Georgia','enable' => '0'),
          array('name' => 'Germany','enable' => '0'),
          array('name' => 'Ghana','enable' => '0'),
          array('name' => 'Gibraltar','enable' => '0'),
          array('name' => 'Greece','enable' => '0'),
          array('name' => 'Grenada','enable' => '0'),
          array('name' => 'Guadeloupe','enable' => '0'),
          array('name' => 'Guam','enable' => '0'),
          array('name' => 'Guatemala','enable' => '0'),
          array('name' => 'Guinea','enable' => '0'),
          array('name' => 'Guinea-Bissau','enable' => '0'),
          array('name' => 'Guyana','enable' => '0'),
          array('name' => 'Haiti','enable' => '0'),
          array('name' => 'Heard and Mc Donald Islands','enable' => '0'),
          array('name' => 'Holy See (Vatican City State)','enable' => '0'),
          array('name' => 'Honduras','enable' => '0'),
          array('name' => 'Hong Kong','enable' => '0'),
          array('name' => 'Hungary','enable' => '0'),
          array('name' => 'Iceland','enable' => '0'),
          array('name' => 'India','enable' => '0'),
          array('name' => 'India','enable' => '0'),
          array('name' => 'Indonesia','enable' => '0'),
          array('name' => 'Iran (Islamic Republic of)','enable' => '0'),
          array('name' => 'Iraq','enable' => '0'),
          array('name' => 'Ireland','enable' => '0'),
          array('name' => 'Israel','enable' => '0'),
          array('name' => 'Italy','enable' => '0'),
          array('name' => 'Jamaica','enable' => '0'),
          array('name' => 'Japan','enable' => '0'),
          array('name' => 'Jordan','enable' => '0'),
          array('name' => 'Kazakhstan','enable' => '0'),
          array('name' => 'Kiribati','enable' => '0'),
          array('name' => 'Kenya','enable' => '0'),
          array('name' => 'Korea, Democratic People s Republic of','enable' => '0'),
          array('name' => 'Korea, Republic of','enable' => '0'),
          array('name' => 'Kuwait','enable' => '0'),
          array('name' => 'Kyrgyzstan','enable' => '0'),
          array('name' => 'Lao, People s Democratic Republic','enable' => '0'),
          array('name' => 'Latvia','enable' => '0'),
          array('name' => 'Lebanon','enable' => '0'),
          array('name' => 'Lesotho','enable' => '0'),
          array('name' => 'Liberia','enable' => '0'),
          array('name' => 'Libyan Arab Jamahiriya','enable' => '0'),
          array('name' => 'Liechtenstein','enable' => '0'),
          array('name' => 'Lithuania','enable' => '0'),
          array('name' => 'Luxembourg','enable' => '0'),
          array('name' => 'Macau','enable' => '0'),
          array('name' => 'Macedonia, The Former Yugoslav Republic of','enable' => '0'),
          array('name' => 'Madagascar','enable' => '0'),
          array('name' => 'Malawi','enable' => '0'),
          array('name' => 'Malaysia','enable' => '0'),
          array('name' => 'Maldives','enable' => '0'),
          array('name' => 'Mali','enable' => '0'),
          array('name' => 'Malta','enable' => '0'),
          array('name' => 'Marshall Islands','enable' => '0'),
          array('name' => 'Martinique','enable' => '0'),
          array('name' => 'Mauritania','enable' => '0'),
          array('name' => 'Mauritius','enable' => '0'),
          array('name' => 'Mayotte','enable' => '0'),
          array('name' => 'Mexico','enable' => '0'),
          array('name' => 'Micronesia, Federated States of','enable' => '0'),
          array('name' => 'Moldova, Republic of','enable' => '0'),
          array('name' => 'Monaco','enable' => '0'),
          array('name' => 'Mongolia','enable' => '0'),
          array('name' => 'Montserrat','enable' => '0'),
          array('name' => 'Morocco','enable' => '0'),
          array('name' => 'Mozambique','enable' => '0'),
          array('name' => 'Myanmar','enable' => '0'),
          array('name' => 'Namibia','enable' => '0'),
          array('name' => 'Nauru','enable' => '0'),
          array('name' => 'Nepal','enable' => '0'),
          array('name' => 'Netherlands','enable' => '0'),
          array('name' => 'Netherlands Antilles','enable' => '0'),
          array('name' => 'New Caledonia','enable' => '0'),
          array('name' => 'New Zealand','enable' => '0'),
          array('name' => 'Nicaragua','enable' => '0'),
          array('name' => 'Niger','enable' => '0'),
          array('name' => 'Nigeria','enable' => '0'),
          array('name' => 'Niue','enable' => '0'),
          array('name' => 'Northern Mariana Islands','enable' => '0'),
          array('name' => 'Norway','enable' => '0'),
          array('name' => 'Oman','enable' => '0'),
          array('name' => 'Pakistan','enable' => '1'),
          array('name' => 'Palau','enable' => '0'),
          array('name' => 'Panama','enable' => '0'),
          array('name' => 'Papua New Guinea','enable' => '0'),
          array('name' => 'Paraguay','enable' => '0'),
          array('name' => 'Peru','enable' => '0'),
          array('name' => 'Philippines','enable' => '0'),
          array('name' => 'Pitcairn','enable' => '0'),
          array('name' => 'Poland','enable' => '0'),
          array('name' => 'Portugal','enable' => '0'),
          array('name' => 'Puerto Rico','enable' => '0'),
          array('name' => 'Qatar','enable' => '0'),
          array('name' => 'Reunion','enable' => '0'),
          array('name' => 'Romania','enable' => '0'),
          array('name' => 'Russian Federation','enable' => '0'),
          array('name' => 'Rwanda','enable' => '0'),
          array('name' => 'Saint Kitts and Nevis','enable' => '0'),
          array('name' => 'Saint Lucia','enable' => '0'),
          array('name' => 'Saint Vincent and the Grenadines','enable' => '0'),
          array('name' => 'Samoa','enable' => '0'),
          array('name' => '','enable' => '0'),
          array('name' => 'San Marino','enable' => '0'),
          array('name' => 'Sao Tome and Principe','enable' => '0'),
          array('name' => 'Saudi Arabia','enable' => '0'),
          array('name' => 'Senegal','enable' => '0'),
          array('name' => 'Seychelles','enable' => '0'),
          array('name' => 'Sierra Leone','enable' => '0'),
          array('name' => 'Singapore','enable' => '0'),
          array('name' => 'Slovakia (Slovak Republic)','enable' => '0'),
          array('name' => 'Slovenia','enable' => '0'),
          array('name' => 'Solomon Islands','enable' => '0'),
          array('name' => 'Somalia','enable' => '0'),
          array('name' => 'South Africa','enable' => '0'),
          array('name' => 'South Georgia and the South Sandwich Islands','enable' => '0'),
          array('name' => 'Spain','enable' => '0'),
          array('name' => 'Sri Lanka','enable' => '0'),
          array('name' => 'St. Helena','enable' => '0'),
          array('name' => 'St. Pierre and Miquelon','enable' => '0'),
          array('name' => 'Sudan','enable' => '0'),
          array('name' => 'Suriname','enable' => '0'),
          array('name' => 'Svalbard and Jan Mayen Islands','enable' => '0'),
          array('name' => 'Swaziland','enable' => '0'),
          array('name' => 'Sweden','enable' => '0'),
          array('name' => 'Switzerland','enable' => '0'),
          array('name' => 'Syrian Arab Republic','enable' => '0'),
          array('name' => 'Taiwan, Province of China','enable' => '0'),
          array('name' => 'Tajikistan','enable' => '0'),
          array('name' => 'Tanzania, United Republic of','enable' => '0'),
          array('name' => 'Thailand','enable' => '0'),
          array('name' => 'Togo','enable' => '0'),
          array('name' => 'Tokelau','enable' => '0'),
          array('name' => 'Tonga','enable' => '0'),
          array('name' => 'Trinidad and Tobago','enable' => '0'),
          array('name' => 'Tunisia','enable' => '0'),
          array('name' => 'Turkey','enable' => '0'),
          array('name' => 'Turkmenistan','enable' => '0'),
          array('name' => 'Turks and Caicos Islands','enable' => '0'),
          array('name' => 'Tuvalu','enable' => '0'),
          array('name' => 'Uganda','enable' => '0'),
          array('name' => 'Ukraine','enable' => '0'),
          array('name' => 'United Arab Emirates','enable' => '0'),
          array('name' => 'United Kingdom','enable' => '0'),
          array('name' => 'United States','enable' => '1'),
          array('name' => 'United States Minor Outlying Islands','enable' => '0'),
          array('name' => 'Uruguay','enable' => '0'),
          array('name' => 'Uzbekistan','enable' => '0'),
          array('name' => 'Vanuatu','enable' => '0'),
          array('name' => 'Venezuela','enable' => '0'),
          array('name' => 'Vietnam','enable' => '0'),
          array('name' => 'Virgin Islands (British)','enable' => '0'),
          array('name' => 'Virgin Islands (U.S.)','enable' => '0'),
          array('name' => 'Wallis and Futuna Islands','enable' => '0'),
          array('name' => 'Western Sahara','enable' => '0'),
          array('name' => 'Yemen','enable' => '0'),
          array('name' => 'Yugoslavia','enable' => '0'),
          array('name' => 'Zambia','enable' => '0'),
          array('name' => 'Zimbabwe','enable' => '0')
        );
        foreach ($countries as $country) {
            Country::create($country);
        }
        
    }
}