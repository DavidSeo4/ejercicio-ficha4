class Header extends HTMLElement {
    constructor() {
      super();
    }
 
    connectedCallback() {
        this.innerHTML = `
        <header>
        <div class="px-3 py-2 bg-dark text-white">
          <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
              <a href="/" class="d-flex align-items-center my-0 my-lg-0 me-lg-auto text-white text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="22.26" height="40">
					<path d="M18.9 0c-1.32 0-2.34.42-2.94 1.26-.66.9-1.02 2.16-1.02 3.9v.12c-.96-.42-2.04-.6-3.18-.6-1.56 0-2.94.36-4.2.96h-.18v-.48c0-1.74-.3-3-.96-3.84S4.8.06 3.48.06C2.34 0 1.56.36.9.96.3 1.62 0 2.46 0 3.6c0 1.44 1.44 3.06 4.38 4.98-1.2 1.92-1.8 4.26-1.8 7.14 0 3.42.84 6.06 2.58 7.92s4.08 2.82 7.14 2.82c1.2 0 2.34-.12 3.36-.3s2.1-.54 3.3-1.08v-1.74c-1.38.54-2.52.9-3.48 1.08-.9.18-1.98.24-3.18.24-2.46 0-4.38-.78-5.7-2.28s-1.98-3.72-2.04-6.6h15.18v-1.56c0-2.4-.48-4.38-1.44-6 2.64-1.8 3.96-3.36 3.96-4.74 0-1.14-.3-1.98-.9-2.64C20.76.36 19.98 0 18.9 0zM4.74 14.16c.12-1.8.6-3.36 1.26-4.56l1.62 1.14c1.38.96 2.58 1.92 3.54 2.82l3.54-2.82 2.04-1.38c.66 1.26 1.02 2.88 1.02 4.8z" fill="#dfdfdf"></path></svg></a>
    
              <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                <li>
                  <a href="categorias.php" class="nav-link text-secondary">
                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"></use></svg>
                    Home
                  </a>
                </li>
                <li>
                  <a href="carrito.php" class="nav-link text-white">
                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"></use></svg>
                    Ver cesta
                  </a>
                </li>
                <li>
                  <a href="logout.php" class="nav-link text-white">
                    <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"></use></svg>
                    Saír
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
      </header>
        `;
      }
    }
    
    customElements.define('header-component', Header);