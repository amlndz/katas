import {saludo} from "../app";

test('Debería devolver un saludo', () => {
    expect(saludo()).toBe('¡Bienvenido a este meetup de Navidad!');
});
