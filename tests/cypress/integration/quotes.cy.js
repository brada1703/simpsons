describe('Quotes Test', () => {
    it('Shows the quotes page', () => {
        cy.visit('/');
        cy.contains('Quotes');
    });
    it('Can search for quotes', () => {
        cy.visit('/');
        cy.get('#search-input').type('Thank you');
        cy.get('#search-button').click();
        cy.contains('Apu Nahasapeemapetilon');
    });
    it('Can filter by character', () => {
        cy.visit('/');
        cy.get('#select-character').select('Otto');
        cy.contains("Oh, wow, windows. I don't think I could afford this place.");
    });
});
