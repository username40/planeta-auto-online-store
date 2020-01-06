export default ({ app }, inject) => {
    /**
     * Возвращает у объекта значение свойства.
     * Если отсутствуют родительские элементы или само свойство - возвращает false
     */
    inject('objectGetProperty', (obj, props) => {
        var splited = props.split('.');
        var temp = obj;
        for(var index in splited) {
            if(typeof temp[splited[index]] === 'undefined') return false;
            temp = temp[splited[index]]
        }
        return temp
    });

    /**
     * Проверяет наличие свойства у объекта
     */
    inject('objectCheckProperty', (obj, props) => {
        var splited = props.split('.');
        var temp = obj;
        for(var index in splited) {
            if(typeof temp[splited[index]] === 'undefined') return false;
            temp = temp[splited[index]]
        }
        return true
    });

    /**
     * Преобразует текст в слаг (безопасный набор символов, который может использоватсья в URL или в качестве названия переменной)
     */
    inject('textToSlug', (str) => {
        var ru = {
            'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
            'е': 'e', 'ё': 'e', 'ж': 'j', 'з': 'z', 'и': 'i',
            'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n', 'о': 'o',
            'п': 'p', 'р': 'r', 'с': 's', 'т': 't', 'у': 'u',
            'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch', 'ш': 'sh',
            'щ': 'shch', 'ы': 'y', 'э': 'e', 'ю': 'u', 'я': 'ya'
        }, n_str = [];

        str = str.replace(/[ъь]+/g, '').replace(/й/g, 'i').replace(' ', '_').replace('-', '_');
        str = str.toLowerCase();
        for ( var i = 0; i < str.length; ++i ) {
            n_str.push(
                ru[ str[i] ]
                || ru[ str[i].toLowerCase() ] == undefined && str[i]
                || ru[ str[i].toLowerCase() ].replace(/^(.)/, function ( match ) { return match.toUpperCase() })
            );
        }

        return n_str.join('');
    });
}
