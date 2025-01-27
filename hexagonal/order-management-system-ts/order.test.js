const {
  addOrder,
  updateOrderStatus,
  listOrders,
  filterOrdersByStatus,
} = require("./order");

describe("Order Management System", () => {
  beforeEach(() => {
    // Reiniciar órdenes antes de cada test
    while (listOrders().length > 0) {
      listOrders().pop();
    }
  });

  test("should add a new order", () => {
    const order = addOrder([{ name: "Book", quantity: 3 }]);
    expect(order).toHaveProperty("id");
    expect(order.products.length).toBe(1);
    expect(order.status).toBe("pending");
  });

  test("should update order status", () => {
    const order = addOrder([{ name: "Book", quantity: 3 }]);
    const updated = updateOrderStatus(order.id, "shipped");
    expect(updated).toBe(true);
    expect(listOrders()[0].status).toBe("shipped");
  });

  test("should not update to an invalid status", () => {
    const order = addOrder([{ name: "Book", quantity: 3 }]);
    const updated = updateOrderStatus(order.id, "pending"); // No puede volver a pendiente
    expect(updated).toBe(false);
  });

  test("should filter orders by status", () => {
    addOrder([{ name: "Book", quantity: 3 }]);
    addOrder([{ name: "Pen", quantity: 5 }]);
    updateOrderStatus(1, "shipped");
    const shippedOrders = filterOrdersByStatus("shipped");
    expect(shippedOrders.length).toBe(1);
    expect(shippedOrders[0].status).toBe("shipped");
  });

  test("should list all orders", () => {
    addOrder([{ name: "Book", quantity: 3 }]);
    addOrder([{ name: "Laptop", quantity: 1 }]);
    const orders = listOrders();
    expect(orders.length).toBe(2);
  });
});
