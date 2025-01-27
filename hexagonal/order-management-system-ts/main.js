const orders = [];

function addOrder(products) {
  const order = {
    id: orders.length + 1,
    products,
    status: "pending",
    date: new Date(),
  };
  orders.push(order);
  return order;
}

function updateOrderStatus(orderId, newStatus) {
  const order = orders.find((order) => order.id === orderId);
  if (!order) return false;

  const validTransitions = {
    pending: ["shipped", "delivered"],
    shipped: ["delivered"],
  };

  if (validTransitions[order.status]?.includes(newStatus)) {
    order.status = newStatus;
    return true;
  }
  return false;
}

function listOrders() {
  return orders;
}

function filterOrdersByStatus(status) {
  return orders.filter((order) => order.status === status);
}

// Ejemplo de uso
addOrder([{ name: "Laptop", quantity: 1 }]);
addOrder([{ name: "Phone", quantity: 2 }]);

updateOrderStatus(1, "shipped");

console.log(filterOrdersByStatus("shipped"));
console.log(listOrders());
