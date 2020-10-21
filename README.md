# S.O.L.I.D. in PHP

- S: Single-Responsibility Principle
- O: Open-Closed Principle
- L: Liskov Substitution Principle
- I: Interface Segregation Principle
- D: Dependency Inversion Principle

# Single-Responsibility Principle (SRP)
A class should only have a single responsibility.

- Every module, class or function in a computer program should have responsibility over a single part of that program's functionality, which it should encapsulate. 

- This principle is about actors and high level architecture.

# Open-Closed Principle (OCP)
Software entities ... should be open for extension, but closed for modification.

- Such an entity can allow its behaviour to be extended without modifying its source code. 

- This principle is about class design and feature extensions.

# Liskov Substitution Principle (LSP)
Objects in a program should be replaceable with instances of their subtypes without altering the correctness of that program.

Derived classes must be substitutable for their base classes.

`The Big Picture:`

- Return types can be made narrower: Sub-classes can return sub-types or a smaller Union Types in the return type.

- Parameters can be widened: Sub-classes must accept and handle all parameter types the parent method handles. But it can be widened to accept more types or parent types.

- Property types cannot be changed.


# Interface Segregation Principle (ISP)
Many client-specific interfaces are better than one general-purpose interface.

This rule means that we should break our interfaces into many smaller ones, so they better satisfy the exact needs of our clients.

# Dependency Inversion Principle (DIP)
 
 High-level modules should not depend on low-level modules. Both should depend on abstractions.

 Abstractions should not depend on details. Details should depend on abstractions.
 
 Or, simply: Depend on abstractions, not on concretions.

