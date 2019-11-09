function dataku(name, age) {
    
    var name = name;
    var age = age;
    var address = "perumahan citra pendawa asri blok E5 no.10 kec. Batu Aji Kota Batam.";
    var hobbies = ['Nonton Anime','belajar pemrograman'];
    var is_married = false;
    var list_school = {name: "SMKN 2 SINGOSARI",year_in: "2014",year_out: "2017", major: "Rekayasa Perangkat Lunak"};
    var skills = {skill_name: 'Web Developer',level: 'beginner'};
    interest_in_coding = true;

    let result = { name, age, address, hobbies, is_married, list_school, skills, interest_in_coding };
    // mengubah object menjadi JSON
    let json_result = JSON.stringify(result)
    // kembalikan value JSON pada console
    return json_result;
} 

console.log(dataku("M. Bambang Sumantri", 21))