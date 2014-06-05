from project_module import project_object, image_object, link_object, challenge_object

p = project_object('parodier', 'Parodier')
p.domain = 'http://www.aidansean.com/'
p.path = 'parodier'
p.preview_image_ = image_object('http://placekitten.com.s3.amazonaws.com/homepage-samples/408/287.jpg', 408, 287)
p.github_repo_name = 'parodier'
p.mathjax = False
p.links.append(link_object(p.domain, 'parodier', 'Live page'))
p.links.append(link_object('http://en.wikipedia.org/', 'wiki/Keep_Calm_and_Carry_On', 'Background information on the original'))
p.introduction = 'This was something I made a while back for reasons that I can\'t quite remember.  It allows the user to create their own version of the "KEEP CALM AND CARRY ON" posters that have been popular in the past decade.'
p.overview = '''The user inputs up to five lines of text which are sent via a GET request to the server.  The server then parses the input, assembles the image and returns it, and then adds the input to a MySQL database on the backend.'''

p.challenges.append(challenge_object('The project needed to interact with a source image and a font.', 'One of the main reasons for working on this project was to learn how to use fonts with PHP and how to create meme-like images.  Finding a suitable font was not easy, and I suspect the actual "font" does not exist.  I cannot remember if the font I used was royalty free or not, so I should probably check on that.  The source image itself was quite easy to use.', 'Resolved, to be revisited'))

p.challenges.append(challenge_object('This project uses a MySQL database, and had to be secure.', 'As usual, the input to the database has to be sanitised.  First time round I left a loophole in there, but that\'s fixed now.  I might revisit this again to tidy up the code a little, it could be made more elegant.  (The MySQL backend was just for my own amusement really.  It\'s fun to see what strangers have used this project to create.)', 'Resolved, to be revisited'))

p.challenges.append(challenge_object('The layout should look good and be semantically correct.', 'To my shame I used a table to make this layout look good.  It\'s not best practice and it\'s not semantically correct so I should come back to this next time I have the urge to practice my CSS skills and remake it using div elements.', 'Resolved, to be replaced'))
