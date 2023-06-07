async function get10News() {
    try {
        let res = await fetch("http://api.clearlake/news10");
        let news = await res.json();
        news.forEach((onenews) => {
            ID_news = onenews.ID_news;
            headline = onenews.headline;
            if (headline.length > 150){
                headline = onenews.headline.substr(0, 150).split(' ').slice(0, -1).join(' ') + '...';
            }
            news_content = onenews.news_content;
            if (news_content.length > 150){
                news_content = onenews.news_content.substr(0, 150).split(' ').slice(0, -1).join(' ') + '...';
            }
            date_of_addition = onenews.date_of_addition;
            let newsHtml = `
                <a href="/src//views//blocks//news_page.php?id=${ID_news}" class="list-group-item list-group-item-action d-flex gap-3" aria-current="true">
                    <img src="/src/assets/icons/news-1.png" alt="twbs" width="30" height="30" class="flex-shrink-0">
                    <div class="d-flex gap-2 w-100 justify-content-between">
                        <div>
                        <h6 id="headline" class="mb-0">${headline}</h6>
                        <p id="news_content" class="opacity-75">${news_content}</p>
                        </div>
                        <small id="date_of_addition" class="opacity-50 text-nowrap">${date_of_addition}</small>
                        </div>
                    </a>
            `;
            document.querySelector(".news-list").innerHTML += newsHtml;
        });
    } catch (error) {
      console.error("Возникла ошибка при извлечении данных:", error);
    }
}
  
get10News()