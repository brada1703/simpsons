describe('Character Test', () => {
    it('Shows an individual character', () => {
        cy.visit('/character/d8c87f46-25d6-424e-becf-b9ff5b1355a9');
        cy.contains("Oh, wow, windows. I don't think I could afford this place.");
    });
    it('Redirects if character ID is wrong', () => {
        cy.visit('/character/THIS-IS-A-WRONG-ID');
        cy.location('pathname', { timeout: 100000 }).should('include', '/characters');
    });
});
