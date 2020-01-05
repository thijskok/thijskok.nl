# Source code for ThijsKok.nl
 
This is the source code for my website, powered by [cnvs](https://github.com/cnvs/cnvs.io).
 
## Installation
 
Start by cloning the repository from Github:

	$ git clone https://github.com/thijskok/thijskok.nl.git

Next, change directory and let Composer install the required packages:

	$ cd thijskok.nl
	$ composer install

Let NPM install the required node modules:

	$ npm install

Run Webpack to generate the CSS/Javascript:

	$ npm run dev

That's it!

## Usage
 
I recommend setting up this repository in your development directory, install 
[Valet](https://laravel.com/docs/6.x/valet), and simply point your browser to the Valet local domain.

For any other webserver, I recommended following the instructions on 
[deploying a standard Laravel application](https://laravel.com/docs/6.x/deployment).
 
## Contributing
 
Note: this CMS is specifically build for my website. Contributions are welcome, but I cannot guarantee your
code will match my purpose.

1. Fork it!
2. Create your feature branch: `git checkout -b my-new-feature`
3. Commit your changes: `git commit -am 'Add some feature'`
4. Push to the branch: `git push origin my-new-feature`
5. Submit a pull request :D
  
## Credits
 
Developer - Thijs Kok (@thijskok)
 
## License
 
The MIT License (MIT)

Copyright (c) 2020 Thijs Kok

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
