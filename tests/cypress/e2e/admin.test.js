describe("Admin can login and open dashboard", () => {
  beforeEach(() => {
    cy.login();
  });

  afterEach(() => {
    cy.activatePlugin("commonsbooking");
    cy.activatePlugin("commonsbooking-bikes-and-trailers");
  });

  it("Open dashboard", () => {
    cy.visit(`/wp-admin`);
    cy.get("h1").should("contain", "Dashboard");
  });

  it("Activates /w CB2 present", () => {
    cy.deactivatePlugin("commonsbooking-bikes-and-trailers");
    cy.deactivatePlugin("commonsbooking");
    cy.activatePlugin("commonsbooking");
    cy.activatePlugin("commonsbooking-bikes-and-trailers");
    cy.get(`[data-slug="commonsbooking-bikes-and-trailers"]`).should('have.class', 'active');
  });

  it ("does not activate without CB2",() => {
    cy.deactivatePlugin("commonsbooking-bikes-and-trailers");
    cy.deactivatePlugin("commonsbooking");
    cy.activatePlugin("commonsbooking-bikes-and-trailers");
    cy.visit('/wp-admin/plugins.php');
    cy.get(`[data-slug="commonsbooking-bikes-and-trailers"]`).should('not.have.class', 'active');
  });

  it("deactivates when CB2 deactivated", () => {
    cy.deactivatePlugin("commonsbooking");
    cy.contains("CommonsBooking is required for CB Bikes and Trailers to work.");
    cy.visit('/wp-admin/plugins.php');
    cy.get(`[data-slug="commonsbooking-bikes-and-trailers"]`).should('not.have.class', 'active');
  });
});
