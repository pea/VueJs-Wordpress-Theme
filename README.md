# Vue.js Wordpress Theme

These theme serves as an interim alternative to SSR for the purpose of providing content to crawlers that are unable to parse JavaScript-generated pages (mainly social media). The theme serves a functioning representation of the website's content when JavaScript is disabled.

To do this all traffic is routed to index.php where our Vue.js #app div lives. PHP then monitors the routes and serves simplified versions of the content to a <noscript> tag and adds necessary meta data to the head.