// Filter Ajax
function postData(url, postData, onSuccess, onError) {
    var data = new FormData();
    var xml = new XMLHttpRequest();

    for ( const [key,value] of Object.entries(postData) ) {
        data.append(key, value);
    }

    xml.onreadystatechange = function() {
        if(xml.readyState == 4) {
            switch(xml.status) {
                case 200:
                    onSuccess(xml);
                    break;
                default:
                    onError(xml);
            }
        }
    }

    xml.open("POST", url, false);
    xml.send(data);
}

let categoryNews = document.querySelectorAll(".menu-news a");
if(categoryNews != null){
    categoryNews.forEach(function(item){
        item.addEventListener("click", function(e){
            e.preventDefault();

            document.querySelector(".menu-news a.current").classList.remove('current');
            item.classList.add('current')

            // postData(ajaxurl, {
            //     action: 'filter',
            //     category: item.dataset.slug
            // }, function(xml) {
            //     var obj = xml.responseText;
            //     document.querySelector(".case-list").innerHTML = obj;
            // }, function() {
            //
            // });
        });
    });
}

let categoryEvents = document.querySelector('.news-select');
if(categoryEvents != null) {
    categoryEvents.addEventListener('change', function() {
        console.log('You selected: ', this.value);
    });
}