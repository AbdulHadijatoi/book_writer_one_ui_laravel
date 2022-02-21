<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Book Preview | BookWriter</title>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap");

      html {
        font-family: "Merriweather", serif;
        font-size: 1rem;
        line-height: 1.6rem;
      }
      article {
        padding: 1rem;
        max-width: 50rem;
        margin: 0 auto;
      }
      h1 {
        font-size: 3rem;
        line-height: 3.5rem;
        font-weight: 900;
        text-transform: capitalize;
      }
      h2 {
        text-transform: capitalize;
      }
      p {
        text-align: justify;
        hyphens: auto;
      }

      /* different style for 1st paragraph*/
      p:first-of-type {
        font-size: 1.1rem;
      }
      /* Drop Cap */
      p:first-of-type:first-letter {
        font-size: 4.2rem;
        font-weight: bold;
        float: left;
        display: inline-block;
        margin-top: 0.5rem;
        padding-right: 0.15rem;
        color: white;
        background-color: red;
        padding: 1.2rem 0.5rem;
        margin-right: 0.5rem;
      }
      p:first-of-type:first-line {
        font-weight: bold;
      }
  </style>

</head>
<body>
  <article>
    <h1>The title of the article</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam lobortis quis mi ac posuere. Integer elementum hendrerit quam, quis lobortis mauris pulvinar sed. In neque dolor, pellentesque vel euismod quis, mollis quis dolor. Suspendisse potenti. </p>
    <p>Proin euismod velit id odio ultrices, sit amet pharetra ex sodales. Fusce non odio sit amet metus mattis lobortis et eu nunc. Phasellus efficitur volutpat tincidunt. Pellentesque facilisis blandit risus, sit amet elementum ligula dapibus viverra.</p>

    <p>Nulla faucibus ex in blandit egestas. Proin sed purus dolor. Etiam turpis nulla, posuere id metus in, rutrum facilisis sem. Fusce non ornare felis. Integer interdum turpis sit amet pretium congue. Nulla ornare justo aliquam efficitur congue. In eros lorem, sollicitudin vel erat ut, rutrum rutrum libero. Etiam aliquet velit at risus maximus gravida.</p>
    <h2>Subtitle goes here and doesn't span thru columns</h2>
    <p>Curabitur molestie consequat felis accumsan rutrum. In vitae viverra mauris. Vestibulum eget porttitor augue. Phasellus mollis purus ac nisi porttitor rhoncus. Sed id lacinia justo, at scelerisque tortor. Donec elementum venenatis erat, a dictum velit viverra ut.</p>
    <p>Fusce non odio sit amet metus mattis lobortis et eu nunc. Phasellus efficitur volutpat tincidunt. Pellentesque facilisis blandit risus, sit amet elementum ligula dapibus viverra</p>
  </article>
  
</body>
</html>
