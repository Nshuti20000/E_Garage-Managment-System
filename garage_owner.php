<!DOCTYPE html>
<html>
<head>
    <title>Garage Owner Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea,
        input[type="password"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn
        {
          width: 100%;
            background-color: #4caf50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration:none

        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        @media only screen and (max-width: 500px) {
            .container {
                max-width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="garage_owner_dashboard.php" class="btn">Back</a>
        <h1>Garage Owner Registration</h1>
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
           
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <label for="garage_name">Garage Name:</label>
            <input type="text" id="garage_name" name="garage_name" required>
            
            <label for="garage_address">District:</label>
            <select name="district" id="district" onchange="populateSectors()" >
                <option value="">Select District</option>
                <!-- Options populated from JSON -->
            </select>
            <label for="sector">Sector:</label>
            <select name="sector" id="sector" onchange="populateCells()">
                <option value="">Select Sector</option>
            </select>
            
            <label for="garage_phone">Garage Phone:</label>
            <input type="number" id="garage_phone" name="garage_phone" required>
            <label for="Garage_Description">Garage Description</label>
           <textarea name="garage_description" ></textarea>
            <label for="garage_email">Garage Email:</label>
            <input type="email" id="garage_email" name="garage_email" required>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" required>
            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" required>
            <input type="submit" value="Register">
        </form>
    </div>
    <script>
        const jsonData={
  "Gasabo": {
    "Bumbogo": {
      "Kinyaga": [
        "Akakaza",
        "Kigarama",
        "Kingabo",
        "Muhozi",
        "Rubungo",
        "Ryakigogo",
        "Zindiro"
      ],
      "Musave": ["Kagarama", "Kayumba", "Ramba", "Rebero", "Rugando"],
      "Mvuzo": [
        "Kigabiro",
        "Kiyoro",
        "Murarambo",
        "Nkona",
        "Nyakabingo",
        "Rukoma"
      ],
      "Ngara": ["Birembo", "Gisasa", "Munini", "Ruhinga", "Uwaruraza"],
      "Nkuzuzu": [
        "Akabenejuru",
        "Akasedogo",
        "Akimpama",
        "Burima",
        "Kityazo"
      ],
      "Nyabikenke": [
        "Bushya",
        "Gikumba",
        "Kamutamu",
        "Karama",
        "Kayenzi",
        "Kigara",
        "Kiriza",
        "Masizi",
        "Mbogo",
        "Nyampamo"
      ],
      "Nyagasozi": [
        "Akanyiramugarura",
        "Akigabiro",
        "Gishaka",
        "Kabuye",
        "Mpabwa",
        "Nyagasambu",
        "Urutarishonga"
      ]
    },
    "Gatsata": {
      "Karuruma": [
        "Akamamana",
        "Akimihigo",
        "Bigega",
        "Busasamana",
        "Kingasire",
        "Kumuyange",
        "Muremera",
        "Nyagasozi",
        "Rugoro",
        "Rwesero",
        "Tetero"
      ],
      "Nyamabuye": [
        "Agakomeye",
        "Gashubi",
        "Gisiza",
        "Hanika",
        "Juru",
        "Kibaya",
        "Mpakabavu",
        "Musango",
        "Ndengo",
        "Nyakabande",
        "Nyakanunga",
        "Rubonobono",
        "Runyonza",
        "Rusoro",
        "Ruvumero",
        "Uwagatovu"
      ],
      "Nyamugari": [
        "Agataramo",
        "Akamwunguzi",
        "Akarubimbura",
        "Akisoko",
        "Amarembo",
        "Amizero",
        "Bwiza",
        "Ihuriro",
        "Isangano",
        "Kanyonyomba",
        "Nyakariba",
        "Rwakarihejuru"
      ]
    },
    "Gikomero": {
      "Gasagara": ["Bwimiyange", "Bwingeyo", "Gasagara", "Rugwiza"],
      "Gicaca": ["Ntaganzwa", "Nyagasozi", "Nyagisozi", "Ruganda"],
      "Kibara": ["Gahinga", "Gasharu", "Kibobo", "Nombe"],
      "Munini": ["Munini", "Mutokerezwa", "Rudakabukirwa", "Runyinya"],
      "Murambi": ["Kimisebeya", "Kivugiza", "Rugarama", "Twina"]
    },
    "Gisozi": {
      "Musezero": [
        "Amajyambere",
        "Amarembo",
        "Byimana",
        "Gasave",
        "Gasharu",
        "Kagara",
        "Nyakariba",
        "Rwinyana"
      ],
      "Ruhango": [
        "Kanyinya",
        "Kumukenke",
        "Murambi",
        "Ntora",
        "Rukeri",
        "Umurava"
      ]
    },
    "Jabana": {
      "Akamatamu": [
        "Akamatamu",
        "Cyeyere",
        "Murehe",
        "Nyacyonga",
        "Nyagasozi",
        "Nyarukurazo"
      ],
      "Bweramvura": [
        "Agakenke",
        "Agatare",
        "Akinyana",
        "Gikingo",
        "Gitega",
        "Gitenga",
        "Nyakabingo",
        "Nyarurama",
        "Rugogwe",
        "Taba"
      ],
      "Kabuye": [
        "Amakawa",
        "Amasangano",
        "Buliza",
        "Ihuriro",
        "Kabeza",
        "Karuruma",
        "Murama",
        "Nyagasozi",
        "Rebero",
        "Rugarama",
        "Tetero"
      ],
      "Kidashya": [
        "Agasekabuye",
        "Agatare",
        "Amasangano",
        "Mubuga",
        "Nyamweru"
      ],
      "Ngiryi": [
        "Agahama",
        "Agasharu",
        "Akabuga",
        "Jurwe",
        "Kiberinka",
        "Nyakirehe",
        "Nyarubuye",
        "Rubona",
        "Rwanyanza",
        "Uwanyange"
      ]
    },
    "Jali": {
      "Agateko": [
        "Bugarama",
        "Bukamba",
        "Byimana",
        "Kabizoza",
        "Kinunga",
        "Urunyinya",
        "Rwankuba"
      ],
      "Buhiza": ["Kabande", "Gatare", "Nyamugali", "Nyarubuye"],
      "Muko": ["Gahinga", "Gatare", "Umunyinya"],
      "Nkusi": ["Agatwa", "Kabagina", "Kajevuba", "Kigarama", "Nyagasayo"],
      "Nyabuliba": ["Nyaburira", "Kirehe", "Mataba", "Nyarurembo", "Rubona"],
      "Nyakabungo": ["Bwocya", "Gitaba", "Karenge", "Rugina", "Ruhihi"],
      "Nyamitanga": ["Agasharu", "Agatare", "Kabuga", "Runyinya"]
    },
    "Kacyiru": {
      "Kamatamu": [
        "Amajyambere",
        "Bukinanyana",
        "Cyimana",
        "Gataba",
        "Itetero",
        "Kabare",
        "Kamuhire",
        "Karukamba",
        "Nyagacyamo",
        "Rwinzovu",
        "Urugwiro",
        "Uruhongore"
      ],
      "Kamutwa": [
        "Agasaro",
        "Gasharu",
        "Inkingi",
        "Kanserege",
        "Kigugu",
        "Ruganwa",
        "Umuco",
        "Umutekano",
        "Urugero",
        "Urwibutso"
      ],
      "Kibaza": [
        "Amahoro",
        "Bwiza",
        "Ihuriro",
        "Ineza",
        "Inyange",
        "Iriba",
        "Kabagari",
        "Ubumwe",
        "Umutako",
        "Urukundo",
        "Virunga"
      ]
    },
    "Kimihurura": {
      "Kamukina": [
        "Inyamibwa",
        "Isangano",
        "Isano",
        "Ituze",
        "Izuba",
        "Juru",
        "Nyenyeri",
        "Umurava",
        "Urumuri"
      ],
      "Kimihurura": [
        "Amahoro",
        "Amajyambere",
        "Imihigo",
        "Intambwe",
        "Mutara",
        "Rugarama",
        "Ubumwe",
        "Umutekano",
        "Urwego"
      ],
      "Rugando": ["Gasange", "Gasasa", "Marembo", "Rebero", "Taba"]
    },
    "Kimironko": {
      "Bibare": [
        "Abatuje",
        "Amariza",
        "Imanzi",
        "Imena",
        "Imitari",
        "Inganji",
        "Ingenzi",
        "Ingeri",
        "Inshuti",
        "Intashyo",
        "Intwari",
        "Inyamibwa",
        "Inyange",
        "Ubwiza",
        "Umwezi"
      ],
      "Kibagabaga": [
        "Akintwari",
        "Buranga",
        "Gasharu",
        "Ibuhoro",
        "Kageyo",
        "Kamahinda",
        "Karisimbi",
        "Karongi",
        "Nyirabwana",
        "Ramiro",
        "Rindiro",
        "Rugero",
        "Rukurazo",
        "Urumuri"
      ],
      "Nyagatovu": [
        "Ibukinanyana",
        "Ibuhoro",
        "Ijabiro",
        "Isangano",
        "Itetero",
        "Urugwiro"
      ]
    },
    "Kinyinya": {
      "Gacuriro": [
        "Agatare",
        "Akanyamugabo",
        "Akarambo",
        "Akaruvusha",
        "Bishikiri",
        "Cyeru",
        "Estate 2020",
        "Kabuhunde II",
        "Kirira",
        "Urubanda",
        "Urugarama"
      ],
      "Gasharu": ["Agatare", "Gasharu", "Kami", "Rwankuba"],
      "Kagugu": [
        "Dusenyi",
        "Gicikiza",
        "Giheka",
        "Kabuhunde I",
        "Kadobogo",
        "Kagarama",
        "Muhororo",
        "Nyakabungo",
        "Rukingu"
      ],
      "Murama": ["Binunga", "Ngaruyinka", "Rusenyi", "Taba"]
    },
    "Ndera": {
      "Bwiza": [
        "Akarwasa",
        "Akasemuromba",
        "Bucyemba",
        "Gasharu",
        "Mukagarama",
        "Ruhangare"
      ],
      "Cyaruzinge": [
        "Ayabakora",
        "Cyaruzinge",
        "Gashure",
        "Gatare",
        "Gisura",
        "Karubibi",
        "Mulindi"
      ],
      "Kibenga": [
        "Bahoze",
        "Berwa",
        "Buhoro",
        "Burunga",
        "Gitaraga",
        "Kira",
        "Nezerwa",
        "Rugazi",
        "Runyonza",
        "Tumurere",
        "Ururembo"
      ],
      "Masoro": [
        "Byimana",
        "Kabeza",
        "Masoro",
        "Matwari",
        "Mubuga",
        "Munini"
      ],
      "Mukuyu": [
        "Akamusare",
        "Akimana",
        "Gasharu",
        "Jurwe",
        "Karambo",
        "Kigabiro",
        "Ruseno"
      ],
      "Rudashya": [
        "Kacyinyaga",
        "Kamahoro",
        "Munini",
        "Nyakagezi",
        "Ruhangare",
        "Ruhogo"
      ]
    },
    "Nduba": {
      "Butare": [
        "Kanani",
        "Kidahe",
        "Kigabiro",
        "Nyamurambi",
        "Nyarubuye",
        "Nyura"
      ],
      "Gasanze": [
        "Gatagara",
        "Kagarama",
        "Nyabitare",
        "Nyakabungo",
        "Nyarubande",
        "Uruhetse"
      ],
      "Gasura": [
        "Agacyamo",
        "Gashinya",
        "Gikombe",
        "Kazi",
        "Kigufi",
        "Nyirakibehe",
        "Uruhahiro"
      ],
      "Gatunga": [
        "Agasharu",
        "Amataba",
        "Burungero",
        "Karama",
        "Nyange",
        "Rebero",
        "Uruyange"
      ],
      "Muremure": ["Gatobotobo", "Kibungo", "Musezero", "Nyaburoro", "Taba"],
      "Sha": [
        "Bikumba",
        "Gakizi",
        "Gatare",
        "Kamuyange",
        "Kigarama",
        "Ngara"
      ],
      "Shango": [
        "Akazi",
        "Kaduha",
        "Kamuhoza",
        "Mirambi",
        "Munini",
        "Ndanyoye",
        "Nyamigina",
        "Rugarama"
      ]
    },
    "Remera": {
      "Nyabisindu": [
        "Amarembo I",
        "Amarembo Il",
        "Gihogere",
        "Kagara",
        "Kinunga",
        "Nyabisindu",
        "Rugarama"
      ],
      "Nyarutarama": [
        "Gishushu",
        "Juru",
        "Kamahwa",
        "Kangondo I",
        "Kangondo II",
        "Kibiraro I",
        "Kibiraro II"
      ],
      "Rukiri I": [
        "Agashyitsi",
        "Amajyambere",
        "Izuba",
        "Gisimenti",
        "Ubumwe",
        "Ukwezi",
        "Urumuri"
      ],
      "Rukiri II": [
        "Amahoro",
        "Rebero",
        "Ruturusu I",
        "Ruturusu II",
        "Ubumwe"
      ]
    },
    "Rusororo": {
      "Bisenga": ["Bisenga", "Gakenyeri", "Gasiza", "Kidogo"],
      "Gasagara": ["Agatare", "Gasagara", "Kamasasa", "Rugagi", "Ryabazana"],
      "Kabuga I": [
        "Abatangampundu",
        "Amahoro",
        "Isangano",
        "Kabeza",
        "Kalisimbi",
        "Masango"
      ],
      "Kabuga II": [
        "Bwiza",
        "Cyanamo",
        "Gatare",
        "Kamashashi",
        "Mataba",
        "Nyagakombe",
        "Ruhangare"
      ],
      "Kinyana": ["Busenyi", "Kigabiro", "Kinyana", "Nyagisozi"],
      "Mbandazi": [
        "Cyeru",
        "Karambo",
        "Kataruha",
        "Mugeyo",
        "Rugarama",
        "Samuduha"
      ],
      "Nyagahinga": [
        "Gisharara",
        "Kabutare",
        "Kanyinya",
        "Kigarama",
        "Nyarucundura",
        "Runyonza",
        "Urumuri"
      ],
      "Ruhanga": ["Kinyaga", "Mirama", "Nyagacyamo", "Rugende", "Ruhanga"]
    },
    "Rutunga": {
      "Gasabo": ["Gasharu", "Mulindi", "Vugavuge"],
      "Indatemwa": [
        "Kabarera",
        "Kamusengo",
        "Karekare",
        "Karuranga",
        "Nyakabande"
      ],
      "Kabaliza": ["Kabaliza", "Nyamise", "Rwanyanza"],
      "Kacyatwa": ["Cyili", "Kacyatwa", "Kandamira", "Kantabana", "Munini"],
      "Kibenga": ["Abanyangeyo", "Kibenga", "Nyamvumvu"],
      "Kigabiro": [
        "Kamusare",
        "Karwiru",
        "Kigabiro",
        "Rukerereza",
        "Rwintare"
      ]
    }
  },
  "Kicukiro": {
    "Gahanga": {
      "Gahanga": [
        "Gahanga",
        "Gatare",
        "Gatovu",
        "Rinini",
        "Rwinanka",
        "Ubumwe"
      ],
      "Kagasa": [
        "Kabeza",
        "Kabidandi",
        "Kiyanja",
        "Nyacyonga",
        "Nyagafunzo",
        "Nyakuguma",
        "Rugando II"
      ],
      "Karembure": [
        "Amahoro",
        "Bigo",
        "Kabeza",
        "Kamuyinga",
        "Karembure",
        "Kimena",
        "Mubuga",
        "Rwamaya"
      ],
      "Murinja": [
        "Kampuro",
        "Kigasa",
        "Mashyiga",
        "Nyabigugu",
        "Nyamuharaza",
        "Rukore",
        "Runyoni",
        "Sabununga"
      ],
      "Nunga": [
        "Kigarama",
        "Kinyana",
        "Mugendo",
        "Nunga I",
        "Nunga II",
        "Rugasa"
      ],
      "Rwabutenge": [
        "Gahosha",
        "Gashubi",
        "Kaboshya",
        "Karambo",
        "Rebero",
        "Rugando I"
      ]
    },
    "Gatenga": {
      "Gatenga": [
        "Amahoro",
        "Gakoki",
        "Gatenga",
        "Ihuriro",
        "Isangano",
        "Rugari"
      ],
      "Karambo": [
        "Gwiza",
        "Ihuriro",
        "Jyambere",
        "Kamabuye",
        "Mahoro",
        "Ramiro",
        "Rebero",
        "Rugwiro",
        "Ruhuka",
        "Sangwa"
      ],
      "Nyanza": [
        "Bwiza",
        "Cyeza",
        "Gasabo",
        "Ihuriro",
        "Isonga",
        "Juru",
        "Marembo",
        "Murambi",
        "Nyanza",
        "Rebero",
        "Rusororo",
        "Sabaganga",
        "Taba"
      ],
      "Nyarurama": ["Bigo", "Bisambu", "Kabeza", "Nyabikenke"]
    },
    "Gikondo": {
      "Kagunga": [
        "Gatare",
        "Kabuye I",
        "Kabuye II",
        "Kagunga I",
        "Kagunga II",
        "Rebero"
      ],
      "Kanserege": [
        "Kanserege I",
        "Kanserege II",
        "Kanserege III",
        "Marembo I",
        "Marembo II",
        "Marembo III"
      ],
      "Kinunga": [
        "Kigugu I",
        "Kigugu II",
        "Kigugu III",
        "Kinunga",
        "Ruganwa I",
        "Ruganwa II",
        "Ruganwa III"
      ]
    },
    "Kagarama": {
      "Kanserege": ["Bwiza", "Byimana", "Ituze", "Kanserege", "Kinunga"],
      "Muyange": ["Kamuna", "Mugeyo", "Muyange", "Rugunga"],
      "Rukatsa": [
        "Inshuti",
        "Mpingayanyanza",
        "Nyacyonga",
        "Nyanza",
        "Rukatsa",
        "Taba"
      ]
    },
    "Kanombe": {
      "Busanza": [
        "Amahoro",
        "Antene",
        "Bamporeze I",
        "Bamporeze II",
        "Gashyushya",
        "Gishikiri",
        "Hope",
        "Kariyeri",
        "Nyarugugu",
        "Radari",
        "Rukore"
      ],
      "Kabeza": [
        "Akagera",
        "Bwiza",
        "Gasabo",
        "Giporoso I",
        "Giporoso II",
        "Juru",
        "Kabeza",
        "Karisimbi",
        "Muhabura",
        "Mulindi",
        "Nyarurembo",
        "Nyenyeri",
        "Rebero"
      ],
      "Karama": [
        "Bitare",
        "Byimana",
        "Cyurusagara",
        "Gakorokombe",
        "Gikundiro",
        "Gitarama",
        "Karama",
        "Nyabyunyu",
        "Nyarutovu",
        "Urukundo"
      ],
      "Rubirizi": [
        "Beninka",
        "Bukunzi",
        "Cyeru",
        "Intwari",
        "Itunda",
        "Kavumu",
        "Susuruka",
        "Ubumwe",
        "Umunara",
        "Uwabarezi",
        "Zirakamwa"
      ]
    },
    "Kicukiro": {
      "Gasharu": ["Amajyambere", "Gasharu", "Sakirwa", "Umunyinya"],
      "Kagina": [
        "Gashiha",
        "Iriba",
        "Multimedia",
        "Umunyinya",
        "Umuremure",
        "Urugero"
      ],
      "Kicukiro": [
        "Gasave",
        "Isoko",
        "Karisimbi",
        "Kicukiro",
        "Triangle",
        "Ubumwe"
      ],
      "Ngoma": ["Ahitegeye", "Intaho", "Iriba", "Isangano", "Urugero"]
    },
    "Kigarama": {
      "Bwerankori": [
        "Gakokobe",
        "Gatare",
        "Imena",
        "Ituze",
        "Kabutare",
        "Kimisange",
        "Nyenyeri",
        "Ubumenyi"
      ],
      "Karugira": [
        "Ibuga",
        "Ihuriro",
        "Murambi",
        "Rutoki",
        "Taba",
        "Terimbere",
        "Ubutare",
        "Umurimo"
      ],
      "Kigarama": [
        "Akimana",
        "Amahoro",
        "Byimana",
        "Indatwa",
        "Ingenzi",
        "Kabeza",
        "Karurayi",
        "Mataba",
        "Umucyo"
      ],
      "Nyarurama": [
        "Kamabuye",
        "Karuyenzi",
        "Kivu",
        "Rebero",
        "Twishorezo",
        "Zuba"
      ],
      "Rwampara": [
        "Amajyambere",
        "Bwiza",
        "Nyarurembo",
        "Ubumwe",
        "Umutekano",
        "Urumuri",
        "Uwateke"
      ]
    },
    "Masaka": {
      "Ayabaraya": [
        "Kababyeyi",
        "Ayabaraya",
        "Nyamico",
        "Nyamyijima",
        "Nyirakavomo",
        "Rususa"
      ],
      "Cyimo": [
        "Biryogo",
        "Bwiza",
        "Cyimo",
        "Kabeza",
        "Kiyovu",
        "Masaka",
        "Murambi",
        "Nyakagunga",
        "Urugwiro"
      ],
      "Gako": [
        "Bamporeze",
        "Butangampundu",
        "Butare",
        "Cyugamo",
        "Gicaca",
        "Gihuke",
        "Kabeza",
        "Kibande",
        "Rebero",
        "Rugende",
        "Ruyaga"
      ],
      "Gitaraga": [
        "Gitaraga",
        "Kabeza",
        "Kajevuba",
        "Nyakarambi",
        "Nyange",
        "Ruhanga",
        "Rwintare"
      ],
      "Mbabe": [
        "Kabeza",
        "Kamashashi",
        "Mbabe",
        "Murambi",
        "Ngarama",
        "Sangano"
      ],
      "Rusheshe": [
        "Cyankongi",
        "Cyeru",
        "Gatare",
        "Kagese",
        "Kanyetabi",
        "Mubano",
        "Ruhosha"
      ]
    },
    "Niboye": {
      "Gatare": [
        "Byimana",
        "Gatare",
        "Imena",
        "Kamahoro",
        "Kigarama",
        "Rugunga",
        "Rurembo",
        "Taba"
      ],
      "Niboye": [
        "Buhoro",
        "Gaseke",
        "Gateke",
        "Gorora",
        "Kigabiro",
        "Kinunga",
        "Kiruhura",
        "Munini",
        "Murehe",
        "Mwijabo",
        "Mwijuto",
        "Nyarubande",
        "Rwezamenyo",
        "Sovu",
        "Taba"
      ],
      "Nyakabanda": [
        "Amahoro",
        "Amarebe",
        "Amarembo",
        "Bigabiro",
        "Bukinanyana",
        "Bumanzi",
        "Bwiza",
        "Gatsibo",
        "Gikundiro",
        "Indakemwa",
        "Indamutsa",
        "Indatwa",
        "Inyarurembo",
        "Isangano",
        "Karama",
        "Kinyana",
        "Rugwiro",
        "Umurava"
      ]
    },
    "Nyarugunga": {
      "Kamashashi": [
        "Akindege",
        "Indatwa",
        "Intwari",
        "Kabagendwa",
        "Kibaya",
        "Mukoni",
        "Mulindi",
        "Umucyo",
        "Uruhongore"
      ],
      "Nonko": [
        "Gasaraba",
        "Gihanga",
        "Gitara",
        "Kavumu",
        "Mahoro",
        "Nyarutovu",
        "Rugali",
        "Runyonza"
      ],
      "Rwimbogo": [
        "Gabiro",
        "Kabaya",
        "Kanogo",
        "Marembo",
        "Umushumba Mwiza",
        "Nyandungu",
        "Ruragendwa",
        "Rwinyana",
        "Rwinyange",
        "Rwiza",
        "Urwibutso"
      ]
    }
  },
  "Nyarugenge": {
    "Gitega": {
      "Akabahizi": [
        "Gihanga",
        "Iterambere",
        "Izuba",
        "Nyaburanga",
        "Nyenyeri",
        "Ubukorikori",
        "Ubumwe",
        "Ubwiyunge",
        "Umucyo",
        "Umurabyo",
        "Umuseke",
        "Vugizo"
      ],
      "Akabeza": ["Akinyambo", "Amayaga", "Gitwa", "Ituze", "Mpazi"],
      "Gacyamo": [
        "Amahoro",
        "Impuhwe",
        "Intsinzi",
        "Kivumu",
        "Ubumwe",
        "Urukundo",
        "Ururembo"
      ],
      "Kigarama": [
        "Ingenzi",
        "Sangwa",
        "Umubano",
        "Umucyo",
        "Umuhoza",
        "Umurava"
      ],
      "Kinyange": [
        "Akabugenewe",
        "Ihuriro",
        "Isangano",
        "Isano",
        "Karitasi",
        "Ubumanzi",
        "Uburezi",
        "Ubwiza",
        "Umucyo",
        "Umwembe",
        "Urugano"
      ],
      "Kora": [
        "Isangano",
        "Kanunga",
        "Kinyambo",
        "Kivumu",
        "Kora",
        "Mpazi",
        "Rugano",
        "Rugari",
        "Ubumwe"
      ]
    },
    "Kanyinya": {
      "Nyamweru": [
        "Bwimo",
        "Gatare",
        "Mubuga",
        "Nyakirambi",
        "Nyamweru",
        "Ruhengeri"
      ],
      "Nzove": [
        "Bibungo",
        "Bwiza",
        "Gateko",
        "Kagasa",
        "Nyabihu",
        "Rutagara I",
        "Rutagara II",
        "Ruyenzi"
      ],
      "Taba": [
        "Kagaramira",
        "Ngendo",
        "Nyarurama",
        "Nyarusange",
        "Rwakivumu",
        "Taba"
      ]
    },
    "Kigali": {
      "Kigali": [
        "Akirwanda",
        "Gisenga",
        "Kadobogo",
        "Kagarama",
        "Kibisogi",
        "Muganza",
        "Murama",
        "Rubuye",
        "Ruhango",
        "Ryasharangabo"
      ],
      "Mwendo": [
        "Agakomeye",
        "Akagugu",
        "Amahoro",
        "Amajyambere",
        "Birambo",
        "Isangano",
        "Kanyabami",
        "Karambo",
        "Mwendo",
        "Ruhuha",
        "Ubuzima",
        "Umutekano"
      ],
      "Nyabugogo": [
        "Gakoni",
        "Gatare",
        "Giticyinyoni",
        "Kadobogo",
        "Kamenge",
        "Karama",
        "Kiruhura",
        "Nyabikoni",
        "Nyabugogo",
        "Ruhondo"
      ],
      "Ruriba": [
        "Misibya",
        "Nyabitare",
        "Ruhango",
        "Ruharabuge",
        "Ruriba",
        "Ruzigimbogo",
        "Ryamakomari",
        "Tubungo"
      ],
      "Rwesero": [
        "Akanyamirambo",
        "Akinama",
        "Makaga",
        "Musimba",
        "Ruhogo",
        "Rwesero",
        "Rweza",
        "Vuganyana"
      ]
    },
    "Kimisagara": {
      "Kamuhoza": [
        "Buhoro",
        "Busasamana",
        "Isimbi",
        "Ituze",
        "Karama",
        "Karwarugabo",
        "Kigabiro",
        "Mataba",
        "Munini",
        "Ntaraga",
        "Nunga",
        "Rurama",
        "Rutunga",
        "Tetero"
      ],
      "Katabaro": [
        "Akamahoro",
        "Akishinge",
        "Akishuri",
        "Amahumbezi",
        "Inganzo",
        "Kigarama",
        "Mpazi",
        "Mugina",
        "Ubumwe",
        "Ubusabane",
        "Umubano",
        "Umurinzi",
        "Uruyange"
      ],
      "Kimisagara": [
        "Akabeza",
        "Amahoro",
        "Birama",
        "Buhoro",
        "Bwiza",
        "Byimana",
        "Gakaraza",
        "Gaseke",
        "Ihuriro",
        "Inkurunziza",
        "Karambi",
        "Kigina",
        "Kimisagara",
        "Kove",
        "Muganza",
        "Nyabugogo",
        "Nyagakoki",
        "Nyakabingo",
        "Nyamabuye",
        "Sangwa",
        "Sano"
      ]
    },
    "Mageregere": {
      "Kankuba": [
        "Kamatamu",
        "Kankuba",
        "Karukina",
        "Musave",
        "Nyarumanga",
        "Rugendabari"
      ],
      "Kavumu": [
        "Ayabatanga",
        "Kankurimba",
        "Kavumu",
        "Mubura",
        "Murondo",
        "Nyakabingo",
        "Nyarubuye"
      ],
      "Mataba": [
        "Burema",
        "Gahombo",
        "Kabeza",
        "Karambi",
        "Kwisanga",
        "Mageragere",
        "Mataba",
        "Rushubi"
      ],
      "Ntungamo": [
        "Akanakamageragere",
        "Gatovu",
        "Nyabitare",
        "Nyarubande",
        "Rubungo",
        "Rwindonyi"
      ],
      "Nyarufunzo": [
        "Akabungo",
        "Akamashinge",
        "Maya",
        "Nyarufunzo",
        "Nyarurama",
        "Rubete"
      ],
      "Nyarurenzi": [
        "Amahoro",
        "Ayabaramba",
        "Gikuyu",
        "Iterambere",
        "Nyabirondo",
        "Nyarurenzi"
      ],
      "Runzenze": ["Gisunzu", "Mpanga", "Nkomero", "Runzenze", "Uwurugenge"]
    },
    "Muhima": {
      "Amahoro": [
        "Amahoro",
        "Amizero",
        "Inyarurembo",
        "Kabirizi",
        "Ubuzima",
        "Uruhimbi"
      ],
      "Kabasengerezi": ["Icyeza", "Ikana", "Intwari", "Kabasengerezi"],
      "Kabeza": [
        "Hirwa",
        "Ikaze",
        "Imanzi",
        "Ingenzi",
        "Ituze",
        "Sangwa",
        "Umwezi"
      ],
      "Nyabugogo": [
        "Abeza",
        "Icyerekezo",
        "Indatwa",
        "Rwezangoro",
        "Ubucuruzi",
        "Umutekano"
      ],
      "Rugenge": ["Imihigo", "Impala", "Rugenge", "Ubumanzi"],
      "Tetero": [
        "Indamutsa",
        "Ingoro",
        "Inkingi",
        "Intiganda",
        "Iwacu",
        "Tetero"
      ],
      "Ubumwe": [
        "Bwahirimba",
        "Duterimbere",
        "Isangano",
        "Nyanza",
        "Urugwiro",
        "Urwego"
      ]
    },
    "Nyakabanda": {
      "Munanira I": [
        "Kabusunzu",
        "Munanira",
        "Ntaraga",
        "Nyagasozi",
        "Rurembo"
      ],
      "Munanira II": [
        "Gasiza",
        "Kamwiza",
        "Kanyange",
        "Karudandi",
        "Kigabiro",
        "Kokobe",
        "Mucyuranyana",
        "Nkundumurimbo"
      ],
      "Nyakabanda I": [
        "Akinkware",
        "Gapfupfu",
        "Gasiza",
        "Kariyeri",
        "Kokobe",
        "Munini",
        "Nyakabanda",
        "Rwagitanga"
      ],
      "Nyakabanda II": [
        "Ibuhoro",
        "Kabeza",
        "Kanyiranganji",
        "Karujongi",
        "Kigarama",
        "Kirwa"
      ]
    },
    "Nyamirambo": {
      "Cyivugiza": [
        "Amizero",
        "Gabiro",
        "Imanzi",
        "Ingenzi",
        "Intwari",
        "Karisimbi",
        "Mahoro",
        "Mpano",
        "Muhabura",
        "Muhoza",
        "Munini",
        "Rugero",
        "Shema"
      ],
      "Gasharu": ["Kagunga", "Karukoro", "Rwintare"],
      "Mumena": [
        "Akanyana",
        "Akanyirazaninka",
        "Akarekare",
        "Akatabaro",
        "Irembo",
        "Itaba",
        "Kiberinka",
        "Mumena",
        "Rwampara"
      ],
      "Rugarama": [
        "Gatare",
        "Kiberinka",
        "Munanira",
        "Riba",
        "Rubona",
        "Rugarama",
        "Runyinya",
        "Rusisiro",
        "Tetero"
      ]
    },
    "Nyarugenge": {
      "Agatare": [
        "Agatare",
        "Amajyambere",
        "Inyambo",
        "Meraneza",
        "Uburezi",
        "Umucyo",
        "Umurava"
      ],
      "Biryogo": ["Biryogo", "Gabiro", "Isoko", "Nyiranuma", "Umurimo"],
      "Kiyovu": [
        "Amizero",
        "Cercle Sportif",
        "Ganza",
        "Imena",
        "Indangamirwa",
        "Ingenzi",
        "Inyarurembo",
        "Ishema",
        "Isibo",
        "Muhabura",
        "Rugunga",
        "Sugira"
      ],
      "Rwampara": [
        "Amahoro",
        "Gacaca",
        "Intwari",
        "Rwampara",
        "Umucyo",
        "Umuganda"
      ]
    },
    "Rwezamenyo": {
      "Kabuguru I": ["Muhoza", "Muhuza", "Mumararungu", "Murambi"],
      "Kabuguru II": ["Buhoro", "Gasabo", "Mutara", "Ubusabane"],
      "Rwezamenyo I": ["Abatarushwa", "Indatwa", "Inkerakubanza", "Intwari"],
      "Rwezamenyo II": ["Amahoro", "Umucyo", "Urumuri"]
    }
  }
}
    
           
        // Function to populate sectors based on selected district
        function populateSectors() {
            var districtSelect = document.getElementById("district");
            var sectorSelect = document.getElementById("sector");
            var selectedDistrict = districtSelect.value;
            sectorSelect.innerHTML = '<option value="">Select Sector</option>'; // Clear sector dropdown
            if (selectedDistrict !== "") {
                var districts = jsonData[selectedDistrict];
                for (var sector in districts) {
                    var option = document.createElement("option");
                    option.text = sector;
                    option.value = sector;
                    sectorSelect.appendChild(option);
                }
            }
            // Automatically populate cells when district changes
            populateCells();
        }

        // Function to populate cells based on selected sector
        function populateCells() {
            var districtSelect = document.getElementById("district");
            var sectorSelect = document.getElementById("sector");
            var cellSelect = document.getElementById("cell");
            var selectedDistrict = districtSelect.value;
            var selectedSector = sectorSelect.value;
            cellSelect.innerHTML = '<option value="">Select Cell</option>'; // Clear cell dropdown
            if (selectedDistrict !== "" && selectedSector !== "") {
                var cells = jsonData[selectedDistrict][selectedSector];
                for (var cell in cells) {
                    var option = document.createElement("option");
                    option.text = cells[cell];
                    option.value = cells[cell];
                    cellSelect.appendChild(option);
                }
            }
        }

        // Populate district dropdown initially
        document.addEventListener("DOMContentLoaded", function() {
            var districtSelect = document.getElementById("district");
            for (var district in jsonData) {
                var option = document.createElement("option");
                option.text = district;
                option.value = district;
                districtSelect.appendChild(option);
            }
            // Automatically populate sectors for the first district
            populateSectors();
        });
    </script>
</body>
</html>

<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_garage_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $garage_name = $_POST['garage_name'];
    $garage_address = $_POST['district'];
    $garage_sector=$_POST['sector'];
    $garage_description=$_POST['garage_description'];
    
    $garage_phone = $_POST['garage_phone'];
    $garage_email = $_POST['garage_email'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    // Insert garage data
    $query = "INSERT INTO garages (name, address, phone, email, latitude, longitude,Sector,garage_description) VALUES (?, ?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param('ssssddss', $garage_name, $garage_address, $garage_phone, $garage_email, $latitude, $longitude,$garage_sector,$garage_description);
    if ($stmt->execute() === false) {
        die("Error executing statement: " . $stmt->error);
    }
    $garage_id = $stmt->insert_id;
    $stmt->close();

    // Insert garage owner data
    $query = "INSERT INTO garage_owners (username, email, password, garage_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    $stmt->bind_param('sssi', $username, $garage_email, $password, $garage_id);
    if ($stmt->execute() === false) {
        die("Error executing statement: " . $stmt->error);
    }
    $stmt->close();

    // Redirect to login page or display a success message
   ?>
   <script>
    window.alert('Data save Successfull');
    
   </script>
   <?php
    exit;
}
?>
