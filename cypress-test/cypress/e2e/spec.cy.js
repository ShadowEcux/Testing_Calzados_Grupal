describe('empty spec', () => {
  it('It should be able to login', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');
  })


  it('It should be able to go to the "Calzado" section', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');

    cy.get('.section-calzados').click();
    cy.wait(1000);
    cy.get('.calzado-table').should('exist');
    cy.wait(2000)
  })
  it('It should be able to go to the "Proveedores" section', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');

    cy.get('.section-proveedores').click();
    cy.wait(1000);
    cy.get('.proveedor-table').should('exist');
    cy.wait(2000)
  })
  it('It should be able to go to the "Clientes" section', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');
    
    cy.get('.section-clientes').click();
    cy.wait(1000);
    cy.get('.clientes-table').should('exist');
    cy.wait(2000)

  })
  it('It should be able to go to the "Categoria" section', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');
    
    cy.get('.section-categoría').click();
    cy.wait(1000);
    cy.get('.categoria-table').should('exist');
    cy.wait(2000)
  })

  it('It should be able to go to the "Administradores" section', () => {
    cy.visit('http://localhost/Testing_Calzados_Grupal/holi/index.php')
    cy.wait(1000)


    cy.get('.login-btn').click()

    cy.wait(1000)

    cy.get('.user-input').type('cristian');
    cy.get('.password-input').type('123456');
    cy.get('.login-btn').click();
    cy.wait(1000)
    
    cy.get('#btnNuevo').should('be.visible').should('exist');
    
    cy.get('.section-administradores').click();
    cy.wait(1000);
    cy.get('.admin-table').should('exist');
    cy.wait(2000)
  })
})
