describe('Characters Test', () => {
    it('Shows the characters page', () => {
        cy.visit('/characters');
        cy.contains('Characters');
    });
    it('Can filter by character', () => {
        cy.visit('/');
        cy.get('#select-character').select('Otto');
        cy.contains("Oh, wow, windows. I don't think I could afford this place.");
    });
});
