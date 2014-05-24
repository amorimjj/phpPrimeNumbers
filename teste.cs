public class ClientesOrquestradora
{
	private ClientesPersiteDados _data;

	public void salvar(Cliente cliente)
	{
		//valida dados do cliente;
		_data.salvar(cliente);
	}

	public Cliente recuperarCliente(int id)
 {
		//valida se entrada é valida
		Cliente c = _data.recupera(id);
		// verificar se cliente é validado e retorna erro
		return c;
 }
}

public class ClientesPersiteDados
{
	public void salvar(Cliente c)
	{
		//salva cliente no banco
	}

	public Cliente recupera(int id)
{
		//recupera cliente do banco
}
}
