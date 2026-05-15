import './bootstrap';
import TomSelect from "tom-select";
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', () => {

    const prodiSelect = document.querySelector('#prodi-select');

    if (prodiSelect) {

        new TomSelect('#prodi-select', {

            plugins: ['remove_button'],

            create: false,

            persist: false,

            maxOptions: 500,

            placeholder: 'Pilih program studi...',

        });

    }

});

document.addEventListener('DOMContentLoaded', () => {

    /**
     * ELEMENT
     */
    const prodiSelect =
        document.querySelector('#prodi-select-skripsi');

    const fakultasInput =
        document.querySelector('#fakultas');

    /**
     * CEK ELEMENT
     */
    if (!prodiSelect || !fakultasInput) return;

    /**
     * UPDATE FAKULTAS
     */
    const updateFakultas = (value) => {

        const option =
            prodiSelect.querySelector(`option[value="${value}"]`);

        fakultasInput.value =
            option?.dataset.fakultas || '';

    };

    /**
     * TOM SELECT
     */
    const tom = new TomSelect('#prodi-select-skripsi', {

        create: false,

        persist: false,

        maxItems: 1,

        maxOptions: 500,

        placeholder: 'Pilih program studi...',

        onChange: function(value) {

            updateFakultas(value);

        }

    });

    /**
     * LOAD AWAL
     * SUPPORT CREATE + EDIT
     */
    if (prodiSelect.value) {

        updateFakultas(prodiSelect.value);

    }

});