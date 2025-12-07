// tagok.js

$(document).ready(function () {

    const hely = $("#hely");

    //
    // JSON betöltése
    //
    let tagok = null;

    fetch("tagok.json")
        .then(res => {
            if (!res.ok) throw new Error("A tagok.json nem tölthető be.");
            return res.json();
        })
        .then(data => {
            tagok = data.tagok;
        })
        .catch(err => {
            hely.html("<p style='color:red;'>Hiba a tagok betöltésekor: " + err.message + "</p>");
            console.error(err);
        });

    //
    // Ékezetmentesítési segédfüggvény
    //
    function normalizeKey(k) {
        return k.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
    }

    //
    // Gomb → JSON kulcs kereső
    //
    function getKulcs(gombId) {
        const nk = normalizeKey(gombId);

        // ismert elírás javítása
        const fixes = {
            "basszsus": "basszus"
        };

        return fixes[nk] || nk;
    }

    //
    // Nevek kiírása
    //
    function kiir(lista) {
        if (!lista || lista.length === 0) {
            hely.html("<i>Nincs adat ebben a szólamban.</i>");
            return;
        }

        let html = "<ul>";
        lista.forEach(tag => {
            html += `<li>${tag.nev}</li>`;
        });
        html += "</ul>";

        hely.html(html);
    }

    //
    // Gombok eseménykezelése
    //
    $("#szopran, #alt, #tenor, #basszus").click(function () {
        if (!tagok) {
            hely.html("<i>Adatok még töltődnek...</i>");
            return;
        }

        const id = $(this).attr("id");
        const kulcs = getKulcs(id);

        const lista = tagok[kulcs];

        kiir(lista);
    });

});
